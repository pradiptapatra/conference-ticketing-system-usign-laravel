<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\SeatInterface;
use App\Interfaces\TicketInterface;
use App\Http\Requests\StoreBookingRequest;
use Illuminate\Support\Facades\DB;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Models\Session;
use Exception;

class BookingController extends Controller
{
    protected $seatInterface;
    protected $ticketInterface;

    public function __construct(SeatInterface $seatInterface, TicketInterface $ticketInterface) {
        $this->seatInterface = $seatInterface;
        $this->ticketInterface = $ticketInterface;
    }

    public function book(StoreBookingRequest $request, $sessionId)
    {
        try {
            $seat = $this->seatInterface->findAvailableBySession($sessionId, $request->seat_id);

            $ticket = DB::transaction(function () use ($seat, $sessionId) {
                $this->seatInterface->update($seat->id, ['status' => 'booked']);

                $ticket = $this->ticketInterface->create([
                    'user_id' => auth()->id(),
                    'session_id' => $sessionId,
                    'seat_id' => $seat->id,
                    'status' => 'confirmed',
                ]);

                $qrCode = new QrCode(route('check-in', $ticket->id));
                $writer = new PngWriter();
                $result = $writer->write($qrCode, null, null, ['width' => 300, 'height' => 300]);
                $qrCodePath = 'qr_' . $ticket->id . '.png';
                $result->saveToFile(storage_path('app/public/' . $qrCodePath));

                $ticket->identityCard()->create([
                    'qr_code' => $qrCodePath,
                    'generated_at' => now()
                ]);

                return $ticket;
            });

            return response()->json([
                'message' => 'Seat booked',
                'ticket' => $ticket
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to book seat: ' . $e->getMessage()
            ], 500);
        }
    }

    public function cancel($ticketId) {
        try {
            $ticket = $this->ticketInterface->find($ticketId);
            $this->authorize('update', $ticket);

            DB::transaction(function () use ($ticket) {
                $this->seatInterface->update($ticket->seat_id, ['status' => 'available']);
                $this->ticketInterface->update($ticket->id, ['status' => 'cancelled']);
            });

            return response()->json(['message' => 'Booking cancelled']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to cancel booking: ' . $e->getMessage()], 500);
        }
    }

    
}
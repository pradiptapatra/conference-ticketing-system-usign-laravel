<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\TicketInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

class IdentityCardController extends Controller
{
    protected $ticketInterface;

    public function __construct(TicketInterface $ticketInterface) {
        $this->ticketInterface = $ticketInterface;
    }

    public function generate($ticketId) {
        try {
            $ticket = $this->ticketInterface->find($ticketId);
            //$this->authorize('view', $ticket);

            $qrPath = storage_path('app/public/' . $ticket->identityCard->qr_code);

            $qrImage = $qrPath;
            if (file_exists($qrPath)) {
                $qrImage = 'data:image/png;base64,' . base64_encode(file_get_contents($qrPath));
            }

            $pdf = Pdf::loadView('identity_card', [
                'ticket' => $ticket->load('session', 'seat', 'identityCard'),
                'qrImage' => $qrImage
            ]);
            return $pdf->download('identity_card_' . $ticket->id . '.pdf');
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to generate identity card: ' . $e], 500);
        }
    }
}
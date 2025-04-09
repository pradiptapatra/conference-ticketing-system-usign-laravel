<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\SessionInterface;
use App\Http\Requests\StoreSessionRequest;
use Exception;

class SessionController extends Controller
{
    protected $sessionInterface;

    public function __construct(SessionInterface $sessionInterface) {
        $this->sessionInterface = $sessionInterface;
    }

    public function index() {
        try {
            $filters = request()->only(['conference_id', 'day', 'speaker_id']);
            $sessions = $this->sessionInterface->getByFilters($filters);
            return response()->json($sessions);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to fetch sessions: ' . $e->getMessage()], 500);
        }
    }

    public function store(StoreSessionRequest $request) {
        try {
            $session = $this->sessionInterface->create($request->only('hall_id', 'title', 'start_time', 'end_time'));
            if ($request->speaker_ids) {
                $session->speakers()->attach($request->speaker_ids);
            }
            return response()->json($session->load('speakers'), 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create session: ' . $e->getMessage()], 500);
        }
    }
}
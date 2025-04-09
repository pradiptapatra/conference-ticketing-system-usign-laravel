<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ConferenceInterface;
use App\Http\Requests\StoreConferenceRequest;
use Exception;

class ConferenceController extends Controller
{
    protected $conferenceInterface;
    public function __construct(ConferenceInterface $conferenceInterface)
    {
        $this->conferenceInterface = $conferenceInterface;
    }

    public function index() {
        try {
            $conferences = $this->conferenceInterface->all();
            return response()->json($conferences);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to fetch conferences: ' . $e->getMessage()], 500);
        }
    }

    public function store(StoreConferenceRequest $request) {
        try {
            $conference = $this->conferenceInterface->create($request->validated());
            return response()->json($conference, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create conference: ' . $e->getMessage()], 500);
        }
    }


}
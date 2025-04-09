<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ConferenceInterface;

class ConferenceController extends Controller
{
    protected $conferenceInterface;
    public function __construct(ConferenceInterface $conferenceInterface)
    {
        $this->conferenceInterface = $conferenceInterface;
    }

    public function index() {
        $conferences = $this->conferenceInterface->getConference();
        return response()->json([
            'conference'=> $conferences,
        ]);
    }
}

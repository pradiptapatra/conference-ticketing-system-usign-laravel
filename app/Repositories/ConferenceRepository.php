<?php

namespace App\Repositories;

use App\Models\Conference;
use App\Interfaces\ConferenceInterface;

class ConferenceRepository implements ConferenceInterface
{
    public $conference;

    public function __construct(Conference $conference)
    {
        $this->conference = $conference;
    }

    public function getConference()
    {
        try {
            $conference = $this->conference->get();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return $conference;
    }

    
}

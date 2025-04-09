<?php

namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface SeatInterface extends BaseInterface
{
    public function findAvailableBySession($sessionId, $seatId);
}
<?php

namespace App\Repositories;

use App\Models\Seat;
use App\Interfaces\SeatInterface;
use App\Repositories\BaseRepository;

class SeatRepository extends BaseRepository implements SeatInterface
{
    public function __construct(Seat $model) {
        parent::__construct($model);
    }

    public function findAvailableBySession($sessionId, $seatId) {
        return $this->model->where('session_id', $sessionId)
            ->where('id', $seatId)
            ->where('status', 'available')
            ->firstOrFail();
    }
}
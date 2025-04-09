<?php

namespace App\Repositories;

use App\Models\Session;
use App\Interfaces\SessionInterface;
use App\Repositories\BaseRepository;

class SessionRepository extends BaseRepository implements SessionInterface
{
    public function __construct(Session $model) {
        parent::__construct($model);
    }

    public function getByFilters(array $filters) {
        $query = $this->model->with(['hall.conference', 'speakers', 'seats']);
        if (isset($filters['conference_id'])) {
            $query->whereHas('hall', fn($q) => $q->where('conference_id', $filters['conference_id']));
        }
        if (isset($filters['day'])) {
            $query->whereDate('start_time', $filters['day']);
        }
        if (isset($filters['speaker_id'])) {
            $query->whereHas('speakers', fn($q) => $q->where('speaker_id', $filters['speaker_id']));
        }
        return $query->get();
    }
}
<?php

namespace App\Repositories;

use App\Models\Conference;
use App\Interfaces\ConferenceInterface;
use App\Repositories\BaseRepository;
class ConferenceRepository extends BaseRepository implements ConferenceInterface
{
    public function __construct(Conference $model) {
        parent::__construct($model);
    }

}
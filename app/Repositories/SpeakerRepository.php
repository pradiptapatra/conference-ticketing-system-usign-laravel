<?php

namespace App\Repositories;

use App\Models\Speaker;
use App\Interfaces\SpeakerInterface;
use App\Repositories\BaseRepository;

class SpeakerRepository extends BaseRepository implements SpeakerInterface
{
    public function __construct(Speaker $model) {
        parent::__construct($model);
    }

}
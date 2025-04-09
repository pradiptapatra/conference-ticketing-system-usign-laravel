<?php

namespace App\Repositories;

use App\Models\Hall;
use App\Interfaces\HallInterface;
use App\Repositories\BaseRepository;

class HallRepository extends BaseRepository implements HallInterface
{
    public function __construct(Hall $model) {
        parent::__construct($model);
    }

}
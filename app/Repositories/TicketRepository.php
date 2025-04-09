<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Interfaces\TicketInterface;
use App\Repositories\BaseRepository;

class TicketRepository extends BaseRepository implements TicketInterface
{
    public function __construct(Ticket $model) {
        parent::__construct($model);
    }

}
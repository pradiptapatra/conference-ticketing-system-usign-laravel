<?php

namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface SessionInterface extends BaseInterface
{
    public function getByFilters(array $filters);
}
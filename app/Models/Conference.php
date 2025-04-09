<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'start_date', 'end_date'];

    public function halls() {
        return $this->hasMany(Hall::class);
    }
}
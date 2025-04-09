<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = ['hall_id', 'title', 'start_time', 'end_time'];

    public function hall() {
        return $this->belongsTo(Hall::class);
    }

    public function speakers() {
        return $this->belongsToMany(Speaker::class, 'session_speaker');
    }

    public function seats() {
        return $this->hasMany(Seat::class);
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
}

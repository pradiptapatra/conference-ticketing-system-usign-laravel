<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'session_id', 'seat_id', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function session() {
        return $this->belongsTo(Session::class);
    }

    public function seat() {
        return $this->belongsTo(Seat::class);
    }

    public function identityCard() {
        return $this->hasOne(IdentityCard::class);
    }
}

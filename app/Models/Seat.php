<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $fillable = ['session_id', 'row', 'column', 'type', 'status'];

    public function session() {
        return $this->belongsTo(Session::class);
    }

    public function ticket() {
        return $this->hasOne(Ticket::class);
    }
}

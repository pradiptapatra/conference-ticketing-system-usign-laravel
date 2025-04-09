<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'bio'];

    public function sessions() {
        return $this->belongsToMany(Session::class, 'session_speaker');
    }
}

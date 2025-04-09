<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;
    protected $fillable = ['conference_id', 'name', 'capacity'];

    public function conference() {
        return $this->belongsTo(Conference::class);
    }

    public function sessions() {
        return $this->hasMany(Session::class);
    }
}

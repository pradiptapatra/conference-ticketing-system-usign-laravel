<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentityCard extends Model
{
    use HasFactory;
    protected $fillable = ['ticket_id', 'qr_code', 'generated_at'];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }
}

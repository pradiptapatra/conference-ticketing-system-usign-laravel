<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\IdentityCard;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::create(['user_id' => 1, 'session_id' => 1, 'seat_id' => 1, 'status' => 'confirmed']);
        IdentityCard::create(['ticket_id' => 1, 'qr_code' => 'qr_001', 'generated_at' => now()]);
    }
}



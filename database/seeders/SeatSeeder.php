<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 2) as $sessionId) {
            for ($row = 1; $row <= 3; $row++) {
                for ($col = 1; $col <= 3; $col++) {
                    Seat::create(['session_id' => $sessionId, 'row' => $row, 'column' => $col, 'type' => 'General']);
                }
            }
        }
    }
}


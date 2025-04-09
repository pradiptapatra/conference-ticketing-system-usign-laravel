<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Session;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $session1 = Session::create(['hall_id' => 1, 'title' => 'AI Trends', 'start_time' => '2025-06-01 09:00:00', 'end_time' => '2025-06-01 10:00:00']);
        $session1->speakers()->attach([1, 2]);

        $session2 = Session::create(['hall_id' => 2, 'title' => 'Cloud Basics', 'start_time' => '2025-06-01 11:00:00', 'end_time' => '2025-06-01 12:00:00']);
        $session2->speakers()->attach(3);
    }
}


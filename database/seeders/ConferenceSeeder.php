<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conference;
class ConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conference::create(['title' => 'Tech Summit 2025', 'start_date' => '2025-06-01', 'end_date' => '2025-06-03']);
        Conference::create(['title' => 'DevCon 2025', 'start_date' => '2025-07-01', 'end_date' => '2025-07-03']);
    }
}

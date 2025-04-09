<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hall;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hall::create(['conference_id' => 1, 'name' => 'Hall A', 'capacity' => 50]);
        Hall::create(['conference_id' => 1, 'name' => 'Hall B', 'capacity' => 30]);
        Hall::create(['conference_id' => 2, 'name' => 'Hall X', 'capacity' => 40]);
    }
}


<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Speaker;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Speaker::create(['name' => 'John Doe', 'bio' => 'AI Expert']);
        Speaker::create(['name' => 'Jane Smith', 'bio' => 'Web Developer']);
        Speaker::create(['name' => 'Alice Brown', 'bio' => 'Cloud Architect']);
    }
}


<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\ConferenceSeeder;
use Database\Seeders\HallSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\SeatSeeder;
use Database\Seeders\SessionSeeder;
use Database\Seeders\SpeakerSeeder;
use Database\Seeders\TicketSeeder;
use Database\Seeders\UserSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            ConferenceSeeder::class,
            HallSeeder::class,
            SpeakerSeeder::class,
            SessionSeeder::class,
            UserSeeder::class,
            SeatSeeder::class,
            TicketSeeder::class
        ]);
    }
}


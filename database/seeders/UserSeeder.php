<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'Example 1', 'email' => 'example1@example.com', 'password' => Hash::make('password')]);
        User::create(['name' => 'Example 2', 'email' => 'example@example.com', 'password' => Hash::make('password')]);
    }
}


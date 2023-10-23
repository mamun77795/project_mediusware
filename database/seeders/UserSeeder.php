<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mizanur Rahman',
            'account_type' => 'Individual', // Enum values
            'email' => 'mizan@gmail.com',
            'balance' => 0,
            'password' => Hash::make(12345),
        ]);
    }
}

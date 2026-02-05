<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mirza Student',
            'email' => 'student@example.com',
            'password' => Hash::make('Student@123'), // Use a secure password in production
            'role' => 'student',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mirza Instructor',
            'email' => 'teacher@example.com',
            'password' => Hash::make('Teacher@123'), // Use a secure password in production
            'role' => 'instructor',
        ]);
    }
}

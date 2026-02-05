<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class CourseSeeder extends Seeder
{
     
    public function run(): void
    {
      

        // Course::factory()->count(10)->create();

                // 'user_id' => User::inRandomOrder()->value('id'),

        $courses = [
            [
                'user_id' => User::where('role', 'instructor')->inRandomOrder()->value('id'),
                'title' => 'HTML',
                'description' => 'Learn the basics of HTML for building web pages.',
                'price' => 100,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('role', 'instructor')->inRandomOrder()->value('id'),
                'title' => 'CSS',
                'description' => 'Master CSS for styling modern websites.',
                'price' => 200,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('role', 'instructor')->inRandomOrder()->value('id'),
                'title' => 'JavaScript',
                'description' => 'Learn JavaScript to make interactive web applications.',
                'price' => 300,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('role', 'instructor')->inRandomOrder()->value('id'),
                'title' => 'PHP',
                'description' => 'Learn PHP for backend web development.',
                'price' => 400,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Course::insert($courses);
    }
}

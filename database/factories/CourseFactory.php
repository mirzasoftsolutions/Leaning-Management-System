<?php

namespace Database\Factories;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
   protected $model = Course::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(3),
            'price' => fake()->randomFloat(2, 199, 9999),
            'status' => fake()->randomElement(['draft', 'published']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

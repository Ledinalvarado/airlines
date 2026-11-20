<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(7),
            'body' => $this->faker->text(),
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(
                ['draft', 'published']),





            'title' => fake()->sentence(6),
            'body' => fake()->text(),
            'user_id' => User::factory(),
            'status' => fake()->randomElement([
                'draft',
                'published'
            ]),
        ];
    }
}












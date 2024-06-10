<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            "title" => $this->faker->title(),
            "body" => $this->faker->realText(100),
            "published_at" => null,
        ];
    }

    public function published(): self
    {
        return $this->state(
            fn(array $attributes) => [
                "published_at" => now(),
            ]
        );
    }
}

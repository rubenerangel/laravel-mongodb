<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(40),
            'isbn'  => $this->faker->isbn10(),
            'author'=> $this->faker->name,
            'published' => $this->faker->boolean,
            'published_at' => $this->faker->dateTimeBetween('-2 years'),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(1,3),
            'title' => fake()->realText(random_int(20, 100)),
            'body' => fake()->realText(random_int(1000, 2000)),
            'publication_date' => fake()->dateTimeBetween('-1 year')->format('Y-m-d H:i:s'),
        ];
    }
}

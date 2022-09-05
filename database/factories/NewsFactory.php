<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1,4),
            'source_id' => 1,
            'title'       => fake()->jobTitle(),
            'author'      => fake()->userName(),
            'status'      => News::DRAFT,
            'image'       => fake()->imageUrl(),
            'description' =>  fake()->text(100)
        ];
    }
}
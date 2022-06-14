<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'alias' => $this->faker->slug(),
            'keywords' => $this->faker->colorName(),
            'parent_id' => 0,
            'type' => 'main',
            'img' => $this->faker->image(),
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

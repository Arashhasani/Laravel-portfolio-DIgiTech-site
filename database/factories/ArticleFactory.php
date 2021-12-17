<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,10),
            'title' => $this->faker->sentence(3),
            'text' => $this->faker->paragraph(24),
            'is_published' => 1,
            'count_view' => 0,
            'bigimage' => '/webb/img/post-1-img.jpg',
            'smallimage' => '/webb/img/post-1-img.jpg',
        ];
    }
}

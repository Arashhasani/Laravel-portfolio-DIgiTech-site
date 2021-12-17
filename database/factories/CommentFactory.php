<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->sentence(4),
            'user_id' => $this->faker->numberBetween(1,10),
            'commentable_id' => $this->faker->numberBetween(1,40),
            'commentable_type' => get_class(new Article()),
            'is_approved' => 1,
        ];
    }
}

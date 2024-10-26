<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence(),
            'post_id' => null, // To be set by the seeder
            'user_id' => null, // To be set by the seeder
        ];
    }
}

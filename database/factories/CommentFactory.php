<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Getting random users and randoms posts for them to comment on
        $randomUser = User::inRandomOrder()->first();
        $randomPost = Post::inRandomOrder()->first();

        return [
            //
            'comment_text' => fake() -> paragraph(4, true),
            'user_id' => $randomUser->id,
            'post_id' => $randomPost->id,
        ];
    }
}

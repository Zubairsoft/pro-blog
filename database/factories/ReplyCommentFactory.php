<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=ReplyComment>
 */
class ReplyCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $comments = Comment::query()->get();

        $users = User::query()->get();

        $authors = Author::query()->get();

        $admins = Admin::query()->get();

        $writers = [...$users, ...$authors, ...$admins];

        $writer = Arr::random($writers);

        return [
            'id' => uuid_create(),
            'user_id' => $writer->id,
            'user_type' => get_class($writer),
            'comment_id' => $comments->random()->id,
            'reply' => fake()->sentence(3)
        ];
    }
}

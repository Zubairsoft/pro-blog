<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Comment>
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
        $posts = Post::query()->active()->get();

        $users = User::query()->get();

        $authors = Author::query()->get();

        $admins = Admin::query()->get();

        $writers = [...$users, ...$authors, ...$admins];

        $writer = Arr::random($writers);

        return [
            'id' => uuid_create(),
            'comment' => fake()->sentence(3),
            'post_id' => $posts->random()->id,
            'userable_id'=>$writer->id,
            'userable_type'=>get_class($writer),
        ];
    }
}

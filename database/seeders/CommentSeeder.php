<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = Comment::factory(500)->make()->chunk(20)->toArray();

        foreach ($comments as $comment) {

            Comment::query()->insert($comment);
        }
    }
}

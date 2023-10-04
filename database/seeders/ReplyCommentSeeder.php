<?php

namespace Database\Seeders;

use App\Models\ReplyComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReplyCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $replyComments = ReplyComment::factory(500)->make()->chunk(25)->toArray();

        foreach ($replyComments as $replyComment) {

            ReplyComment::query()->insert($replyComment);
        }
    }
}

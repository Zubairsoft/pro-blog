<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class TagPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags=Tag::query()->pluck('id')->toArray();
        Post::query()->get()->each(fn($post)=>$post->tags()->sync(Arr::random($tags,Arr::random([1,2,3]))));
    }
}

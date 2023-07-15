<?php

namespace Domains\Authors\Actions\Posts;

use App\Models\Post;

class ShowPostAction
{
    public function __invoke( string $id): Post
    {
        return Post::query()->with('tags')->findOrFail($id);
    }
}

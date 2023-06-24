<?php

namespace Domains\Admins\Actions\Posts;

use App\Models\Post;

class ShowPostAction
{
    public function __invoke( string $id): Post
    {
        return Post::query()->findOrFail($id);
    }
}

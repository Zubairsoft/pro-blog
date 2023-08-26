<?php

namespace Domains\Admins\Actions\Posts;

use App\Http\Requests\Admins\PostRequest;
use App\Models\Post;

class DestroyPostAction
{
    public function __invoke(PostRequest $request): int
    {
        return Post::query()->whereIn('id', $request->ids)->delete();
    }
}

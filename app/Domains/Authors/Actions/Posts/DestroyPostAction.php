<?php

namespace Domains\Authors\Actions\Posts;

use App\Http\Requests\Admins\PostRequest;
use App\Models\Post;

class DestroyPostAction
{
    public function __invoke(PostRequest $request): int
    {
    }
}

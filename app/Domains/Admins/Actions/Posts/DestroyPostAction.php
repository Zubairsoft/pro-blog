<?php

namespace Domains\Admins\Actions\Posts;

use App\Http\Requests\Admins\PostRequest;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;

class DestroyPostAction
{
    public function __invoke(PostRequest $request): void
    {
        $posts= Post::query()->whereIn('id', $request->ids)->get();

        foreach ($posts as $post) {
            if ($request->user()->cannot('destroy', $post)) {
                throw new AuthorizationException();
            }
            $post->delete();
        }
    }
}

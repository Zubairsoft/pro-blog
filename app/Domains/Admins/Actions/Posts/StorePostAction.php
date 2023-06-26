<?php

namespace Domains\Admins\Actions\Posts;

use App\Http\Requests\Admins\PostRequest;
use App\Models\Post;
use Domains\Admins\DataTransferToObject\PostData;
use Illuminate\Support\Facades\Auth;

class StorePostAction
{
    public function __invoke(PostRequest $request): Post
    {
        $attributes = unsetArrayEmptyParam(PostData::fromRequest($request)->toArray());

        $admin = Auth::user();

        $post = $admin->posts()->create($attributes);

        $post->tags()->sync($request->tags);

        if ($request->poster->isFile()) {
            $post->addMediaFromRequest('poster')->toMediaCollection('poster');
        }

        return $post;
    }
}

<?php

namespace Domains\Admins\Actions\Posts;

use App\Http\Requests\Admins\PostRequest;
use App\Models\Post;
use Domains\Admins\DataTransferToObject\PostData;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class UpdatePostAction
{
    public function __invoke(PostRequest $request, string $id): Post
    {
        $attributes = unsetArrayEmptyParam(PostData::fromRequest($request)->toArray());
        $admin = Auth::user();

        $post = $admin->posts()->findOrFail($id);

        if ($request->user()->cannot('update', $post)) {
            throw new AuthorizationException();
        }

        $post->update($attributes);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        if ($request->poster?->isFile()) {
            $post->addMediaFromRequest('poster')->toMediaCollection('poster');
        }

        return $post;
    }
}

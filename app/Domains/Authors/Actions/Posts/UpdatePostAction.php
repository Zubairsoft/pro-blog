<?php

namespace Domains\Authors\Actions\Posts;

use App\Http\Requests\Authors\PostRequest;
use App\Models\Post;
use Domains\Authors\DataTransferToObject\PostData;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

final class UpdatePostAction
{
    public function __invoke(PostRequest $request, string $id): Post
    {
        $attributes = unsetArrayEmptyParam(PostData::fromRequest($request)->toArray());
        $author = Auth::user();

        $post = $author->posts()->findOrFail($id);

        if ($request->user()->cannot('update', $post)) {
            throw new AuthorizationException();
        }

        $post->update($attributes);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        $post->AddImageFromRequestIfExists($request,'poster','poster');

        $post->AddMultipleImageFromRequestIfRequestIfExists($request,'images','post-images');

        return $post;
    }
}

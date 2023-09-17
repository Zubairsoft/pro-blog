<?php

namespace Domains\Authors\Actions\Posts;

use App\Http\Requests\Authors\PostRequest;
use App\Models\Post;
use Domains\Authors\DataTransferToObject\PostData;
use Illuminate\Support\Facades\Auth;

class StorePostAction
{
    public function __invoke(PostRequest $request): Post
    {
        $attributes = unsetArrayEmptyParam(PostData::fromRequest($request)->toArray());

        $author = Auth::user();

        $post = $author->posts()->create($attributes);

        $post->tags()->sync($request->tags);

        $post->AddImageFromRequestIfExists($request,'poster','poster');

        $post->AddMultipleImageFromRequestIfRequestIfExists($request,'images','post-images');

        return $post;
    }
}

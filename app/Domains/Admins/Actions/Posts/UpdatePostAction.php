<?php

namespace Domains\Admins\Actions\Posts;

use App\Http\Requests\Admins\PostRequest;
use App\Models\Post;
use Domains\Admins\DataTransferToObject\PostData;
use Illuminate\Support\Facades\Auth;

class UpdatePostAction
{
    public function __invoke(PostRequest $request, string $id): Post
    {
        $attributes = unsetArrayEmptyParam(PostData::fromRequest($request)->toArray());

        $admin = Auth::user();

        $post = $admin->posts()->findOrFail($id);

        $post->update($attributes);

        if ($request->poster->isFile()) {
            $post->addMediaFromRequest('poster')->toMediaCollection('poster');
        }

        return $post;
    }
}

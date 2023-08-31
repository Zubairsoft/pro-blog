<?php

namespace Domains\Authors\Actions\Posts;

use App\Http\Requests\Authors\PostRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

final class DestroyPostAction
{
    public function __invoke(PostRequest $request)
    { 
        $author = Auth::user();

        $posts= $author->posts()->whereIn('id', $request->ids)->get();

        foreach ($posts as $post) {
            if ($request->user()->cannot('destroy', $post)) {
                throw new AuthorizationException();
            }
            
            $post->delete();
        }
    }
}

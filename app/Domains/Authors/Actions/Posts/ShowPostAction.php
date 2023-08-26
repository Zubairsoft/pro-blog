<?php

namespace Domains\Authors\Actions\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ShowPostAction
{
    public function __invoke(string $id): Post
    {
        $author = Auth::user();

        $post = $author->posts()->findOrFail($id);

        return $post->load('tags');
    }
}

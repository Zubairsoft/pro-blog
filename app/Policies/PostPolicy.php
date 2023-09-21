<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(Author $author, Post $post): bool
    {
        if (Auth::guard('web')->check()) {
            return  Auth::guard('web')->user()->id === $post->authorable_id;
        }
        return $author->id === $post->authorable_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(Author $author, Post $post): bool
    {
        if (Auth::guard('web')->check()) {
            return  Auth::guard('web')->user()->id === $post->authorable_id;
        }
        return $author->id === $post->authorable_id;
    }

    /**
     * Determine whether the user can delete the poster.
     */
    public function clearImage(Author $author, Post $post): bool
    {
        if (Auth::guard('web')->check()) {
            return  Auth::guard('web')->user()->id === $post->authorable_id;
        }
        return $author->id === $post->authorable_id;
    }
}

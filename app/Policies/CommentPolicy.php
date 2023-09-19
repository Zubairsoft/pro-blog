<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(Author $author, Comment $comment): bool
    {
        if (Auth::guard('web')->check()) {
            return  Auth::guard('web')->user()->id === $comment->userable_id;
        }
        return $author->id === $comment->userable_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(Author $author, Comment $comment): bool
    {
        if (Auth::guard('web')->check()) {
            return  Auth::guard('web')->user()->id === $comment->userable_id;
        }
        return $author->id === $comment->userable_id;
    }
}

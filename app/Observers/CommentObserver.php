<?php

namespace App\Observers;

use App\Models\Comment;
use Domains\Supports\Notifications\CommentNotification;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        $author = $comment->post->authorable;

        if ($comment->userable_id !== $author->id) {

            $author->notify(new CommentNotification($comment));
        }
    }
}

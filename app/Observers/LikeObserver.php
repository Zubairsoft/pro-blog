<?php

namespace App\Observers;

use App\Models\Like;
use Domains\Supports\Notifications\LikePostNotification;

class LikeObserver
{
    /**
     * Handle the Like "created" event.
     */
    public function created(Like $like): void
    {
         $author=$like->post->authorable;

         $author->notify(new LikePostNotification($like));
    }
}

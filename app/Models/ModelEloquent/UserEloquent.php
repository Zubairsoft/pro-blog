<?php

namespace App\Models\ModelEloquent;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait UserEloquent
{
    public function posts(): MorphMany
    {
        return $this->morphMany(Post::class, 'authorable');
    }

    public function bookmarks(): MorphMany
    {
        return $this->morphMany(Bookmark::class, 'userable');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'userable');
    }

    public function replyComments(): MorphMany
    {
        return $this->morphMany(ReplyComment::class, 'user');
    }
}

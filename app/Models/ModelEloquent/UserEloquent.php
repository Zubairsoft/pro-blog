<?php

namespace App\Models\ModelEloquent;

use App\Models\OtpActivation;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait UserEloquent
{
    public function otpActivation(): MorphOne
    {
        return $this->morphOne(OtpActivation::class, 'activatable');
    }

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

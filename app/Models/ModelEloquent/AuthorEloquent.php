<?php

namespace App\Models\ModelEloquent;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\OtpActivation;
use App\Models\Post;
use App\Models\ReplyComment;
use App\Models\Report;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait AuthorEloquent
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

    public function reports(): MorphMany
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    public function writeReports(): MorphMany
    {
        return $this->morphMany(Report::class, 'writable');
    }
}

<?php

namespace App\Models\ModelEloquent;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\ReplyComment;
use App\Models\Report;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait UserEloquent
{
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

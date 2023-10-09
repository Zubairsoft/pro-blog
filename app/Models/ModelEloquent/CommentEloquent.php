<?php

namespace App\Models\ModelEloquent;

use App\Models\ReplyComment;
use App\Models\Report;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait CommentEloquent
{
    public function userable(): MorphTo
    {
        return $this->morphTo();
    }

    public function replyComments(): HasMany
    {
        return $this->hasMany(ReplyComment::class);
    }

    public function reports(): MorphMany
    {
        return $this->morphMany(Report::class, 'reportable');
    }
}

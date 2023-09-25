<?php

namespace App\Models\ModelEloquent;

use App\Models\ReplyComment;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
}

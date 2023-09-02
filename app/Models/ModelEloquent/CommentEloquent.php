<?php

namespace App\Models\ModelEloquent;

use App\Models\ReplayComment;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait CommentEloquent
{
    public function userable(): MorphTo
    {
        return $this->morphTo();
    }

    public function relayComments(): HasMany
    {
        return $this->hasMany(ReplayComment::class);
    }
}

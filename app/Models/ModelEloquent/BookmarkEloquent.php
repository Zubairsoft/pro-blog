<?php

namespace App\Models\ModelEloquent;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait BookmarkEloquent
{
    public function userable(): MorphTo
    {
        return $this->morphTo();
    }
    
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}

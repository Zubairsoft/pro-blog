<?php

namespace App\Models\ModelEloquent;

use App\Models\Tag;
use App\Models\TagPost;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait PostEloquent
{
    public function authorable(): MorphTo
    {
        return $this->morphTo();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->using(TagPost::class);
    }
}

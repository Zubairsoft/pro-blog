<?php

namespace App\Models\ModelEloquent;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Report;
use App\Models\Tag;
use App\Models\TagPost;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait PostEloquent
{
    public function authorable(): MorphTo
    {
        return $this->morphTo();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_posts')->using(TagPost::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function reports(): MorphMany
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}

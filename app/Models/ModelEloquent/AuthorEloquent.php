<?php

namespace App\Models\ModelEloquent;

use App\Models\Bookmark;
use App\Models\OtpActivation;
use App\Models\Post;
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
}

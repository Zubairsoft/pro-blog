<?php

namespace App\Models\ModelEloquent;

use App\Models\Admin;
use App\Models\Post;
use App\Models\TagPost;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait TagEloquent
{
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class,'tag_posts')->using(TagPost::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}

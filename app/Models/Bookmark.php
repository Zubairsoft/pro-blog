<?php

namespace App\Models;

use App\Models\ModelEloquent\BookmarkEloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookmark extends BaseModel
{
    use SoftDeletes , BookmarkEloquent;

    protected $fillable = [
        'post_id',
    ];

    protected $casts = [];
}

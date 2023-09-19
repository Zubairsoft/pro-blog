<?php

namespace App\Models;

use App\Models\ModelEloquent\CommentEloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends BaseModel
{
    use SoftDeletes,
        CommentEloquent;

    protected $fillable = [
        'post_id',
        'comment',
    ];
}

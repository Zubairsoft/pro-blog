<?php

namespace App\Models;

use App\Models\ModelEloquent\ReplyCommentEloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReplyComment extends BaseModel
{
    use SoftDeletes;
    use ReplyCommentEloquent;

    protected $fillable = [
        'user_id',
        'user_type',
        'reply',
        'is_seen'
    ];

    protected $casts = [
        'is_seen' => 'boolean',
    ];
}

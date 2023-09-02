<?php

namespace App\Models;

use App\Models\ModelEloquent\ReplayCommentEloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReplayComment extends BaseModel
{
    use SoftDeletes;
    use ReplayCommentEloquent;

    protected $fillable = [
        'comment_id',
        'is_seen'
    ];

    protected $casts = [
        'is_seen' => 'boolean',
    ];
}

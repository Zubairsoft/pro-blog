<?php

namespace App\Models;

use App\Models\ModelEloquent\LikeEloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends BaseModel
{
    use LikeEloquent;

    protected $fillable = [
        'userable_id',
        'userable_type'
    ];

    protected $casts = [];
}

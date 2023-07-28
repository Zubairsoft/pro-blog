<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Bookmark extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [];

    protected $casts = [];
}

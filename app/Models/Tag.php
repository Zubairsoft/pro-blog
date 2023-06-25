<?php

namespace App\Models;

use App\Models\ModelAttributes\TagAttributes;
use App\Models\ModelEloquent\TagEloquent;

class Tag extends BaseModel
{
    use TagAttributes;
    use TagEloquent;

    protected $fillable = [
        'name_ar',
        'name_en',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}

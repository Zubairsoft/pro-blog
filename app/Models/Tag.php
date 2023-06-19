<?php

namespace App\Models;

use App\Models\ModelAttributes\TagAttributes;

class Tag extends BaseModel
{
    use TagAttributes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'is_active'
    ];

    protected $casts=[
        'is_active'=>'boolean',
    ];
}

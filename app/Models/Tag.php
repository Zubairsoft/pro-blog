<?php

namespace App\Models;

use App\Models\ModelAttributes\TagAttributes;
use App\Models\ModelEloquent\TagEloquent;
use Domains\Supports\Traits\HasSearch;

class Tag extends BaseModel
{
    use TagAttributes;
    use TagEloquent;
    use HasSearch;

    protected $fillable = [
        'admin_id',
        'name_ar',
        'name_en',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}

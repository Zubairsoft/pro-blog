<?php

namespace App\Models;

use App\Models\ModelAttributes\ReportAttributes;
use App\Models\ModelEloquent\ReportEloquent;
use Domains\Admins\Enums\ReportStatusEnum;
use Domains\Supports\Traits\HasSearch;

class Report extends BaseModel
{
    use HasSearch;
    use ReportEloquent;
    use ReportAttributes;

    protected $fillable = [
        'writable_id',
        'writable_type',
        'reason',
    ];

    protected $casts = [
        'status' => ReportStatusEnum::class
    ];
}

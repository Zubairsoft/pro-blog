<?php

namespace App\Models\ModelEloquent;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait ReportEloquent
{
    public function writable(): MorphTo
    {
        return $this->morphTo();
    }

    public function reportable(): MorphTo
    {
        return $this->morphTo();
    }
}

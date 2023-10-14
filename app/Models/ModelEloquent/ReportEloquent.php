<?php

namespace App\Models\ModelEloquent;

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

<?php

namespace App\Models\ModelEloquent;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait OtpActivationEloquent
{
    public function activatable(): MorphTo
    {
        return $this->morphTo();
    }
}

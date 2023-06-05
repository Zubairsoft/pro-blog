<?php

namespace App\Models\ModelEloquent;

use App\Models\OtpActivation;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait UserEloquent
{
    public function otpActivation(): MorphOne
    {
        return $this->morphOne(OtpActivation::class, 'activatable');
    }
}

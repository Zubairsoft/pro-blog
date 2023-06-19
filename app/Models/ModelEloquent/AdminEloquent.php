<?php

namespace App\Models\ModelEloquent;

use App\Models\OtpActivation;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait AdminEloquent
{
    public function otpActivation(): MorphOne
    {
        return $this->morphOne(OtpActivation::class, 'activatable');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}

<?php

namespace App\Models\ModelEloquent;

use App\Models\ActivationToken;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait UserEloquent
{
    public function ActivationToken():MorphOne
    {
        return $this->morphOne(ActivationToken::class,'tokenable');
    }
}
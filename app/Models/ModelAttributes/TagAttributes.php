<?php

namespace App\Models\ModelAttributes;

use Domains\Supports\Traits\CommonAttributes\StatusAttribute;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait TagAttributes
{
   use StatusAttribute;

    protected function name(): Attribute
    {
        return new Attribute(get: fn () => app()->currentLocale() === 'ar' ? $this->name_ar : $this->name_en);
    }
}

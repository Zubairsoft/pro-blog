<?php

namespace App\Models\ModelAttributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait TagAttributes
{

    protected function status(): Attribute
    {
        return new Attribute(get: fn () => $this->is_active ? __('keywords.active') : __('keywords.dis_active'));
    }

    protected function name(): Attribute
    {
        return new Attribute(get: fn () => app()->currentLocale() === 'ar' ? $this->name_ar : $this->name_en);
    }
}

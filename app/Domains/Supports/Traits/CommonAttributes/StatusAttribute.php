<?php

namespace Domains\Supports\Traits\CommonAttributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait StatusAttribute
{
    protected function status(): Attribute
    {
        return new Attribute(get: fn () => $this->is_active ? __('keywords.active') : __('keywords.dis_active'));
    }
}

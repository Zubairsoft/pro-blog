<?php

namespace Domains\Supports\Traits\CommonAttributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait PasswordAttribute
{
    protected function password(): Attribute
    {
        return new Attribute(set: fn ($value) => bcrypt($value));
    }
}

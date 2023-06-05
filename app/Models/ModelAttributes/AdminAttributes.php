<?php

namespace App\Models\ModelAttributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait AdminAttributes
{

    protected function password(): Attribute
    {
        return new Attribute(set: fn ($value) => bcrypt($value));
    }
}

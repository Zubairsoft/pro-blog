<?php

namespace App\Models\ModelAttributes;

use Domains\Supports\Traits\CommonAttributes\GenderTranslateAttribute;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait AdminAttributes
{
    use  GenderTranslateAttribute;
    
    protected function password(): Attribute
    {
        return new Attribute(set: fn ($value) => bcrypt($value));
    }
    
}

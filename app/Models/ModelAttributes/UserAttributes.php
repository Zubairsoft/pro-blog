<?php

namespace App\Models\ModelAttributes;

use Domains\Supports\Traits\CommonAttributes\AvatarAttribute;
use Domains\Supports\Traits\CommonAttributes\GenderTranslateAttribute;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait UserAttributes
{
    use  GenderTranslateAttribute, AvatarAttribute;

    protected function password(): Attribute
    {
        return new Attribute(set: fn ($value) => bcrypt($value));
    }

    protected function name(): Attribute
    {
        return Attribute::make(fn () => $this->first_name . ' ' . $this->last_name);
    }
}

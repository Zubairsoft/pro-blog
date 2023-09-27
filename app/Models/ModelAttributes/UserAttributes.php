<?php

namespace App\Models\ModelAttributes;

use Domains\Supports\Traits\CommonAttributes\AvatarAttribute;
use Domains\Supports\Traits\CommonAttributes\GenderTranslateAttribute;
use Domains\Supports\Traits\CommonAttributes\PasswordAttribute;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait UserAttributes
{
    use  GenderTranslateAttribute, AvatarAttribute, PasswordAttribute;


    protected function name(): Attribute
    {
        return Attribute::make(fn () => $this->first_name . ' ' . $this->last_name);
    }
}

<?php

namespace Domains\Supports\Traits\CommonAttributes;

use Domains\Supports\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait AvatarAttribute
{
    protected function avatar(): Attribute
    {
        return new Attribute(get: fn () => !empty($this->getFirstMediaUrl('avatar'))
            ? $this->getFirstMediaUrl('avatar') : ($this->gender->is(GenderEnum::MALE) ? asset('defaults/male.png') : asset('defaults/female.png')));
    }
}

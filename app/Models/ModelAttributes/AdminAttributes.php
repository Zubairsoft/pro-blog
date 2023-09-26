<?php

namespace App\Models\ModelAttributes;

use Domains\Supports\Traits\CommonAttributes\AvatarAttribute;
use Domains\Supports\Traits\CommonAttributes\GenderTranslateAttribute;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait AdminAttributes
{
    use  GenderTranslateAttribute,AvatarAttribute;

    protected function password(): Attribute
    {
        return new Attribute(set: fn ($value) => bcrypt($value));
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar;
    }

}

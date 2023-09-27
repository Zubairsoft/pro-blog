<?php

namespace App\Models\ModelAttributes;

use Domains\Supports\Traits\CommonAttributes\AvatarAttribute;
use Domains\Supports\Traits\CommonAttributes\GenderTranslateAttribute;
use Domains\Supports\Traits\CommonAttributes\PasswordAttribute;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait AdminAttributes
{
    use  GenderTranslateAttribute, AvatarAttribute, PasswordAttribute;

 
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar;
    }
}

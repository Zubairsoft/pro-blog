<?php
namespace Domains\Supports\Traits\CommonAttributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait GenderTranslateAttribute
{
    protected function genderTranslate(): Attribute
    {
        return new Attribute(get:fn () => $this->gender->description);
    }
}
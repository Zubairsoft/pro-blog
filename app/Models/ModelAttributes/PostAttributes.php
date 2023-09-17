<?php

namespace App\Models\ModelAttributes;

use Domains\Supports\Traits\CommonAttributes\TranslateAttributes;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait PostAttributes
{
    use TranslateAttributes;


    protected function poster(): Attribute
    {
        return Attribute::make(
            get: fn () =>
            $this->getFirstMediaUrl('poster')
        );
    }

    protected function images(): Attribute
    {
        return Attribute::make(
            get: fn () =>
            $this->getMedia('post-images')
        );
    }
}

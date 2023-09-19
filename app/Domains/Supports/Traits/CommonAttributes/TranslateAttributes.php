<?php

namespace Domains\Supports\Traits\CommonAttributes;

use Domains\Supports\Enums\LocalEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;

trait TranslateAttributes
{
 protected function title():Attribute
 {
    return Attribute::make(fn()=> App::currentLocale()===LocalEnum::ARABIC?$this->title_ar:$this->title_en);
 }

 protected function description():Attribute
 {
    return Attribute::make(fn()=> App::currentLocale()===LocalEnum::ARABIC?$this->description_ar:$this->description_en);
 }

}
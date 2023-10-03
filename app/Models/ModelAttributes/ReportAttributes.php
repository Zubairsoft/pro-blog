<?php

namespace App\Models\ModelAttributes;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait ReportAttributes
{
    protected function reportType(): Attribute
    {
        return Attribute::make(get: function () {

            return match ($this->reportable_type) {
                Author::class, Admin::class =>__('resources.user'),
                Post::class => __('resources.post'),
                Comment::class => __('resources.comment'),
            };
        });
    }
}

<?php

namespace Domains\Supports\Traits\CommonScopes;

use Illuminate\Database\Eloquent\Builder;

trait ActiveScope
{
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}

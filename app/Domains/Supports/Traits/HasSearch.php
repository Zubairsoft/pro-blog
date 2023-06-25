<?php

namespace Domains\Supports\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasSearch
{
    public function scopeSearch(Builder $query,array $columns,$searchText): Builder
    {
        //TODO implemment Logic for handle search

        return $query;
    }
}

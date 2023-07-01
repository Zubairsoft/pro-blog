<?php

namespace Domains\Supports\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasSearch
{
    public function scopeSearch(Builder $query, array $columns, $searchText): Builder
    {
        $columnMap = collect($columns)->map(fn ($column) => "`$column`" . ' like ' . "'%{$searchText}%' ")->toArray();

        $queryString = join(' or ', $columnMap);

        return $query->whereRaw("($queryString)");
    }
}

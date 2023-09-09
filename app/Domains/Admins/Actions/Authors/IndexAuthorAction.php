<?php

namespace Domains\Admins\Actions\Authors;

use App\Models\Author;
use Domains\Supports\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class IndexAuthorAction
{
    public function __invoke(Request $request)
    {
        $perPage = $request->input('perPage') ?? 10;

        $searchText = $request->input('searchText');

        $gender = $request->input('gender') ? (in_array($request->gender, GenderEnum::getKeys()) ? $request->gender : false) : false;

        $sortBy = $request->input('sortBy') ?? 'desc';

        $query = Author::query()->when(
            $searchText,
            fn (Builder $builder) => $builder->search(['first_name', 'last_name', 'email'], $searchText)
        )->when(
            $gender,
            fn (Builder $builder) =>
            $builder->where('gender', $request->gender)
        )->orderBy('created_at', $sortBy)
            ->perPage($perPage);

        return $query;
    }
}

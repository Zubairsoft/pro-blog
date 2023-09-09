<?php

namespace Domains\Admins\Actions\Admins;

use App\Models\Admin;
use Domains\Supports\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class IndexAdminAction
{
    public function __invoke(Request $request)
    {
        $perPage = $request->input('perPage') ?? 10;

        $searchText = $request->input('searchText');

        $gender = $request->input('gender') ? (in_array($request->gender, GenderEnum::getKeys()) ? $request->gender : false) : false;

        $sortByName = $request->input('sortByName') ?? 'asc';

        $sortBy = $request->input('sortBy') ?? 'desc';

        $query = Admin::query()->when(
            $searchText,
            fn (Builder $builder) => $builder->search(['name', 'email'], $searchText)
        )->when(
            $gender,
            fn (Builder $builder) =>
            $builder->where('gender', $request->gender)
        )
            ->orderBy('created_at', $sortBy)
            ->orderBy('name', $sortByName)
            ->perPage($perPage);

        return $query;
    }
}

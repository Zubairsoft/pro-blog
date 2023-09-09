<?php

namespace Domains\Admins\Actions\Admins;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class IndexAdminAction
{
    public function __invoke(Request $request)
    {
        $perPage = $request->input('perPage') ?? 10;

        $searchText = $request->input('searchText');

        $sortByName = $request->input('sortByName') ?? 'asc';

        $sortBy = $request->input('sortBy') ?? 'desc';

        $query = Admin::query()->when(
            $searchText,
            fn (Builder $builder) => $builder->search($searchText)
        )
            ->orderBy('created_at', $sortBy)
            ->orderBy('name', $sortByName)
            ->perPage($perPage);

        return $query;
    }
}

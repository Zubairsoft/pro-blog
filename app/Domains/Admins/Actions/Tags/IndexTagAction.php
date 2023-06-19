<?php

namespace Domains\Admins\Actions\Tags;

use App\Http\Resources\Admins\TagResource;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexTagAction
{
    public function __invoke(Request $request)
    {
        $perPage = $request->perPage ?? 10;

        $sortBy = $request->input('sortBy') ?? 'desc';

        $orderBy = $request->input('orderBy') ?? 'created_at';

        $searchText = $request->input('searchText');

        $tags = Tag::query()->when($searchText, fn (Builder $query) =>
        $query->where('name_en', 'like', "%{$searchText}%")
            ->orWhere('name_ar', 'like', "%{$searchText}%"))
            ->orderBy($orderBy, $sortBy)
            ->paginate($perPage);

        return $tags;
    }
}

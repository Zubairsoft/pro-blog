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

        $tags = Tag::query()->with('admin')->when($searchText, fn (Builder $query) =>
        $query->search(['name_ar', 'name_en'], $searchText))
            ->orderBy($orderBy, $sortBy)
            ->paginate($perPage);

        return TagResource::collection($tags)->appends($request->query());
    }
}

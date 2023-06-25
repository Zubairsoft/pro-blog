<?php

namespace Domains\Admins\Actions\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexPostAction
{
    public function __invoke(Request $request)
    {
        $perPage = $request->input('perPage') ?? 10;

        $searchText = $request->input('search_text');

        $orderBy = $request->input('orderBy') ?? 'created_at';

        $sortBy = $request->input('sortBy') ?? 'desc';

        $query = Post::query()->with('tags')->whereHas('tags', fn (Builder $builder) => $builder->whereIn('tags.id', $request->tagIds))

            ->when($searchText, fn (builder $builder) => $builder->where('title', 'like', "%{$searchText}%"))

            ->orderBy($orderBy, $sortBy)

            ->paginate($perPage);

        return $query;
    }
}

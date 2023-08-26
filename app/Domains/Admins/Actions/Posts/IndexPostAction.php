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

        $searchText = $request->input('searchText');

        $orderBy = $request->input('orderBy') ?? 'created_at';

        $sortBy = $request->input('sortBy') ?? 'desc';

        $query = Post::query()->with('tags')->when($request->input('tagIds'), fn (Builder $query) => $query->whereHas('tags', fn (Builder $builder) => $builder->whereIn('tags.id', $request->tagIds)))

            ->when($searchText, fn (builder $builder) => $builder->search(['title_ar', 'title_en', 'description_ar', 'description_en'],$searchText))
            ->orderBy($orderBy, $sortBy)

            ->paginate($perPage);

        return $query;
    }
}

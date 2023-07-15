<?php

namespace Domains\Authors\Actions\Posts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class IndexPostAction
{
    public function __invoke(Request $request)
    {
        $sortBy = $request->input('sortBy') ?? 'desc';

        $orderBy = $request->input('orderBy') ?? 'created_at';

        $searchText = $request->input('searchText');

        $perPage = $request->input('perPage') ?? 10;

        $author = Auth::user();

        $query = $author->posts()->when(
            $searchText,
            fn (Builder $builder) => $builder->search([
                'title_ar',
                'title_en',
                'description_ar',
                'description_en'
            ], $searchText)
        )->when(
            $request->input('tagIds'),
            fn (Builder $query) => $query->whereHas('tags', fn (Builder $builder) => $builder->whereIn('tags.id', $request->tagIds))
        )
            ->orderBy($orderBy, $sortBy)->paginate($perPage);

        return $query;
    }
}

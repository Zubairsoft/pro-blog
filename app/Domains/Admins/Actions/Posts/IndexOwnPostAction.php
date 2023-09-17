<?php

namespace Domains\Admins\Actions\Posts;

use App\Http\Resources\Admins\Posts\PostResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexOwnPostAction
{
    public function __invoke(Request $request)
    {
        $perPage = 10;

        $sort = $request->input('sort') ?? 'id';

        $sortBy = $request->input('sortBy') ?? 'desc';

        $searchText = $request->input('searchText');

        $admin = Auth::user();

        $posts = $admin->posts()->with(['tags','media'])
            ->when(
                $searchText,
                fn (Builder $builder) => $builder->search(['title_ar', 'title_en', 'description_ar', 'description_en'], $searchText)
            )->orderBy($sort, $sortBy)
            ->paginate($perPage);

            return PostResource::collection($posts)->appends($request->query())->toArray();
        }
}

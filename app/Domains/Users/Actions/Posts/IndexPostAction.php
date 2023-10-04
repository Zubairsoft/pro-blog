<?php

namespace Domains\Users\Actions\Posts;

use App\Http\Requests\Users\Posts\IndexPostRequest;
use App\Http\Resources\Users\Posts\PostsResource;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class IndexPostAction
{

    public function __invoke(IndexPostRequest $request)
    {
        $searchText = $request->input('searchText');

        $local = app()->currentLocale();

        $posts = Post::query()
            ->with([
                'tags:id,name_ar,name_en',
                'media',
                'authorable',
                'comments:id,post_id,comment,userable_id,userable_type',
                'comments.userable',
                'comments.replyComments',
                'comments.replyComments.user'
            ])
            ->when(
                $request->has('tags'),
                fn (Builder $builder) =>
                $builder->whereHas('tags', function ($query) use ($request) {
                    $query->whereIn('tags.id', $request->tags);
                })
            )->when(
                $searchText,
                fn (Builder $query) => $query->search(['title_ar', 'title_en', 'description_ar', 'description_en'], $searchText)
            )->active()->publish($local)->paginate(12);

        return PostsResource::collection($posts)->appends($request->query())->toArray();
    }
}

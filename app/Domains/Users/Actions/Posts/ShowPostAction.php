<?php

namespace Domains\Users\Actions\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class ShowPostAction
{

    public function __invoke(string $id): Post
    {
        $local = app()->currentLocale();

        $user = getAuthenticatedUser();

        $post = Post::query()->when(
            checkUserIsAuthenticated(),
            fn (Builder $query) =>
            $query->withExists([
                'likes as is_like' => fn ($query) =>
                $query->where([['userable_id', '=', $user->id], ['userable_type', '=', get_class($user)]]),
                'bookmarks as is_bookmark' => fn ($query) =>
                $query->where([['userable_id', '=', $user->id], ['userable_type', '=', get_class($user)]])
            ])
        )->with([
            'tags:id,name_ar,name_en',
            'media',
            'authorable',
            'comments:id,post_id,comment,userable_id,userable_type',
            'comments.userable',
            'comments.replyComments',
            'comments.replyComments.user'
        ])->withCount([
            'comments as comment_count',
            'likes as like_count'
        ])->publish($local)->active()->findOrFail($id);

        return $post;
    }
}

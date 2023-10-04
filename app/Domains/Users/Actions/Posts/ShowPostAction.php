<?php

namespace Domains\Users\Actions\Posts;

use App\Models\Post;

class ShowPostAction
{

    public function __invoke(string $id): Post
    {
        $local = app()->currentLocale();

        $post = Post::query()->publish($local)->active()->findOrFail($id);

        return $post->load([
            'tags:id,name_ar,name_en',
            'media',
            'authorable',
            'comments:id,post_id,comment,userable_id,userable_type',
            'comments.userable',
            'comments.replyComments',
            'comments.replyComments.user'
        ]);
    }
}

<?php

namespace Domains\Users\Actions\Posts\Likes;

use App\Models\Post;
use Domains\Users\DataTransferToObject\LikeData;

class DestroyLikeAction
{
    public function __invoke(string $id)
    {
        $user = getAuthenticatedUser();

        $post = Post::query()->findOrFail($id);

        $post->likes()->where([['userable_id', $user->id], ['userable_type', get_class($user)]])->delete();
    }
}

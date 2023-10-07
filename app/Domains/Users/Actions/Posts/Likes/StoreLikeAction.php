<?php

namespace Domains\Users\Actions\Posts\Likes;

use App\Models\Post;
use Domains\Users\DataTransferToObject\LikeData;

class StoreLikeAction
{
    public function __invoke(string $id)
    {
        $post = Post::query()->findOrFail($id);

        $post->likes()->firstOrCreate(LikeData::data(), []);
    }
}

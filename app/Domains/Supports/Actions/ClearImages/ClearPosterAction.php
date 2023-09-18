<?php

namespace Domains\Supports\Action\ClearImages;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

final class ClearPosterAction
{
    use AuthorizesRequests;
    public function __invoke(string $postId)
    {
        $post = Post::query()->findOrFail($postId);

        $this->authorize('clearImage', $post);

        $post->clearMediaCollection('poster');
    }
}

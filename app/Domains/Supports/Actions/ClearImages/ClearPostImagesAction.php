<?php

namespace Domains\Supports\Action\ClearImages;

use App\Http\Requests\Supports\ClearImages\ClearImageRequest;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

final class ClearPostImagesAction
{
    use AuthorizesRequests;
    public function __invoke(ClearImageRequest $request, string $postId)
    {
        $post = Post::query()->findOrFail($postId);

        $this->authorize('clearImage', $post);

        $images = $post->getMedia('cv')->WhereIn('id', $request->ids);

        foreach ($images as $image) {
            $image->delete();
        }
    }
}

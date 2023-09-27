<?php

namespace Domains\Admins\Actions\Tags;

use App\Http\Requests\Admins\TagRequest;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DestroyTagAction
{
    use AuthorizesRequests;

    public function __invoke(TagRequest $request): void
    {
        $tags = Tag::query()->whereIn('id', $request->ids)->get();

        foreach ($tags as $tag) {
            $this->authorize('destroy', $tag);
            $tag->delete();
        }
    }
}

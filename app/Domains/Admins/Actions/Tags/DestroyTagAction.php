<?php

namespace Domains\Admins\Actions\Tags;

use App\Http\Requests\Admins\TagRequest;
use App\Models\Tag;

class DestroyTagAction
{
    public function __invoke(TagRequest $request): int
    {
        return Tag::query()->whereIn('id',$request->ids)->delete();
    }
}

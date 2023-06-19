<?php

namespace Domains\Admins\Actions\Tags;

use App\Models\Tag;

class ShowTagAction
{
    public function __invoke(string $id)
    {
        $tag = Tag::query()->findOrFail($id);
        
        return $tag;
    }
}

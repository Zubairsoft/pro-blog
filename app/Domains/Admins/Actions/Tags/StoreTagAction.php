<?php

namespace Domains\Admins\Actions\Tags;

use App\Http\Requests\Admins\TagRequest;
use Domains\Admins\DataTransferToObject\TagData;
use Illuminate\Support\Facades\Auth;

class StoreTagAction
{
    public function __invoke(TagRequest $request)
    {
        $attributes = unsetArrayEmptyParam(TagData::fromRequest($request)->toArray());

        $admin=Auth::user();

        $tag = $admin->tags()->create($attributes);
        
        return $tag;
    }
}

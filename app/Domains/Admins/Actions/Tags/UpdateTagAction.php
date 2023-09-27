<?php

namespace Domains\Admins\Actions\Tags;

use App\Http\Requests\Admins\TagRequest;
use Domains\Admins\DataTransferToObject\TagData;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class UpdateTagAction
{
    use AuthorizesRequests;
    public function __invoke(TagRequest $request, string $id)
    {
        $attributes = unsetArrayEmptyParam(TagData::fromRequest($request)->toArray());

        $admin = Auth::user();

        $tag = $admin->tags()->findOrFail($id);

        $this->authorize('update',$tag);

        $tag->update($attributes);

        return $tag;
    }
}

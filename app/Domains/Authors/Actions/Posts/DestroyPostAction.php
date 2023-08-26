<?php

namespace Domains\Authors\Actions\Posts;

use App\Http\Requests\Authors\PostRequest;
use Illuminate\Support\Facades\Auth;

final class DestroyPostAction
{
    public function __invoke(PostRequest $request): int
    {
        $author = Auth::user();

        return $author->posts()->whereIn('id', $request->ids)->delete();
    }
}

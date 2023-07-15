<?php

namespace Domains\Authors\Actions\Posts;

use App\Http\Requests\Authors\PostRequest;
use App\Models\Post;
use Domains\Authors\DataTransferToObject\PostData;
use Illuminate\Support\Facades\Auth;

class StorePostAction
{
    public function __invoke(PostRequest $request): Post
    {

    }
}

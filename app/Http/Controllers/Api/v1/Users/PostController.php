<?php

namespace App\Http\Controllers\Api\v1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Posts\IndexPostRequest;
use App\Http\Resources\Users\Posts\PostsResource;
use Domains\Users\Actions\Posts\IndexPostAction;
use Domains\Users\Actions\Posts\ShowPostAction;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function index(IndexPostRequest $request): JsonResponse
    {
        $posts = (new IndexPostAction)($request);

        return sendSuccessResponse(__('messages.get_data'), $posts);
    }

    public function show(string $id): JsonResponse
    {
        $post = (new ShowPostAction)($id);

        return sendSuccessResponse(__('messages.get_data'),  PostsResource::make($post));
    }
}

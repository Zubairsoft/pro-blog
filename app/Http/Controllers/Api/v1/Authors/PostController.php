<?php

namespace App\Http\Controllers\Api\v1\Authors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\PostRequest;
use Domains\Authors\Actions\Posts\IndexPostAction;
use Domains\Authors\Actions\Posts\ShowPostAction;
use Domains\Authors\Actions\Posts\StorePostAction;
use Domains\Authors\Actions\Posts\UpdatePostAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Handle the incoming request for fetch all author posts
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $posts = (new IndexPostAction)($request);

        return sendSuccessResponse(__('messages.get_data'), $posts);
    }

    /**
     * Handle the incoming request for store post
     * 
     * @param PostRequest $request
     * 
     * @return JsonResponse
     */
    public function store(PostRequest $request): JsonResponse
    {
        $post = (new StorePostAction)($request);

        return sendSuccessResponse(__('messages.create_data'), $post);
    }

    /**
     * Handle the incoming request for show specific post
     * 
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $post = (new ShowPostAction)($id);

        return sendSuccessResponse(__('messages.get_data'), $post);
    }

    /**
     * Handle the incoming request for update post
     * 
     * @param PostRequest $request
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function update(PostRequest $request, string $id): JsonResponse
    {
        $post = (new UpdatePostAction)($request, $id);

        return sendSuccessResponse(__('messages.update_data'), $post);
    }
}

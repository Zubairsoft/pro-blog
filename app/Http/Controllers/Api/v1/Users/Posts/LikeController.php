<?php

namespace App\Http\Controllers\Api\v1\Users\Posts;

use App\Http\Controllers\Controller;
use Domains\Users\Actions\Posts\Likes\DestroyLikeAction;
use Domains\Users\Actions\Posts\Likes\StoreLikeAction;
use Illuminate\Http\JsonResponse;

class LikeController extends Controller
{
    /**
     * handle the incoming request for like post
     *
     * @param string $id
     *
     * @return JsonResponse
     */
    public function store(string $id): JsonResponse
    {
        (new StoreLikeAction)($id);

        return sendSuccessResponse(__('messages.create_data'));
    }

    /**
     * Handle the incoming request for destroy like post
     * @param string $id
     *
     * @return JsonResponse
     */
    public function destroy(string $id):JsonResponse
    {
        (new DestroyLikeAction)($id);

        return sendSuccessResponse(__('messages.create_data'));
    }
}

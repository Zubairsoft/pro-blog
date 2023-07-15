<?php

namespace App\Http\Controllers\Api\v1\Authors;

use App\Http\Controllers\Controller;
use Domains\Authors\Actions\Posts\IndexPostAction;
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

}

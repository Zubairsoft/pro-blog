<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\CommentRequest;
use Domains\Admins\Actions\Comments\IndexCommentAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Handle the incoming request for fetch all comments about specific post 
     * 
     * @param Request $request
     * @param mixed $id
     * 
     * @return JsonResponse
     */
    public function index(Request $request, $id): JsonResponse
    {
        $comments = (new IndexCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.create_data'), $comments);
    }

 
}

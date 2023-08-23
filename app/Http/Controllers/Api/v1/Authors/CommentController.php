<?php

namespace App\Http\Controllers\Api\v1\Authors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\CommentRequest;
use Domains\Authors\Actions\Comments\DestroyCommentAction;
use Domains\Authors\Actions\Comments\IndexCommentAction;
use Domains\Authors\Actions\Comments\ShowCommentAction;
use Domains\Authors\Actions\Comments\StoreCommentAction;
use Domains\Authors\Actions\Comments\UpdateCommentAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming for fetch all comment about post
     * 
     * @param Request $request
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function index(Request $request, string $id): JsonResponse
    {
        $comments = (new IndexCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.get_data'), $comments);
    }

    /**
     * Handle the incoming request for store comment
     * 
     * @param CommentRequest $request
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function store(CommentRequest $request, string $id): JsonResponse
    {
        $comments = (new StoreCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.create_data'), $comments);
    }

    /**
     * Handle the incoming request for show comment
     * 
     * @param string $id
     * @param string $commentId
     * 
     * @return JsonResponse
     */
    public function show(string $id, string $commentId): JsonResponse
    {
        $comments = (new ShowCommentAction)($id, $commentId);

        return sendSuccessResponse(__('messages.get_data'), $comments);
    }

    /**
     * Handle the incoming request for update comment
     * 
     * @param CommentRequest $request
     * @param string $id
     * @param string $commentId
     * 
     * @return JsonResponse
     */
    public function update(CommentRequest $request, string $id, string $commentId): JsonResponse
    {
        $comments = (new UpdateCommentAction)($request, $id, $commentId);

        return sendSuccessResponse(__('messages.update_data'), $comments);
    }

    /**
     * Handle the incoming request for delete comment
     * 
     * @param CommentRequest $request
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function destroy(CommentRequest $request, string $id): JsonResponse
    {
        $comments = (new DestroyCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.delete_data'), $comments);
    }
}

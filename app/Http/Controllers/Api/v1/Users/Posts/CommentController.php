<?php

namespace App\Http\Controllers\Api\v1\Users\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Posts\CommentRequest;
use App\Http\Resources\Users\Posts\CommentsResource;
use Domains\Users\Actions\Posts\Comments\DestroyCommentAction;
use Domains\Users\Actions\Posts\Comments\StoreCommentAction;
use Domains\Users\Actions\Posts\Comments\UpdateCommentAction;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
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
        $comment = (new StoreCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.create_data'), CommentsResource::make($comment));
    }

    /**
     * handle the incoming request for update comment
     *
     * @param CommentRequest $request
     * @param mixed $id
     * @param mixed $commentId
     *
     * @return JsonResponse
     */
    public function update(CommentRequest $request, $id, $commentId): JsonResponse
    {
        $comment = (new UpdateCommentAction)($request, $id, $commentId);

        return sendSuccessResponse(__('messages.update_data'), CommentsResource::make($comment));
    }

    /**
     * handle the incoming request for destroy comment
     *
     * @param CommentRequest $request
     * @param string $id
     *
     * @return JsonResponse
     */
    public function destroy(CommentRequest $request, string $id): JsonResponse
    {
        (new DestroyCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}

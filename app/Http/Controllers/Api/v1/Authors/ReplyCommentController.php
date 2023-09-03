<?php

namespace App\Http\Controllers\Api\v1\Authors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\ReplyCommentRequest;
use App\Http\Resources\Authors\ReplyComments\ReplyCommentResource;
use Domains\Authors\Actions\ReplyComments\DestroyReplyCommentAction;
use Domains\Authors\Actions\ReplyComments\StoreReplyCommentAction;
use Domains\Authors\Actions\ReplyComments\UpdateReplyCommentAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReplyCommentController extends Controller
{
        /**
     * Handle the incoming request for store reply comment
     * 
     * @param ReplyCommentRequest $request
     * @param string $id
     * @param string $commentId
     * 
     * @return JsonResponse
     */
    public function store(ReplyCommentRequest $request, string $id, string $commentId): JsonResponse
    {
        $replyComment = (new StoreReplyCommentAction)($request, $id, $commentId);

        return sendSuccessResponse(__('messages.create_data'), ReplyCommentResource::make($replyComment));
    }

    /**
     * Handle the incoming request for Update replay comment
     * 
     * @param ReplyCommentRequest $request
     * @param string $id
     * @param string $commentId
     * @param string $replyCommentId
     * 
     * @return JsonResponse
     */
    public function update(ReplyCommentRequest $request, string $id, string $commentId, string $replyCommentId): JsonResponse
    {
        $replyComment = (new UpdateReplyCommentAction)($request, $id, $commentId, $replyCommentId);

        return sendSuccessResponse(__('messages.update_data'), ReplyCommentResource::make($replyComment));
    }

    /**
     * Handle the incoming request for for delete reply comments
     * @param ReplyCommentRequest $request
     * @param string $id
     * @param string $commentId
     * 
     * @return JsonResponse
     */
    public function destroy(ReplyCommentRequest $request, string $id, string $commentId): JsonResponse
    {
        (new DestroyReplyCommentAction)($request, $id, $commentId);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}

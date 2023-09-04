<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\ReplyCommentRequest;
use App\Http\Resources\Admins\ReplyComments\ReplyCommentResource;
use Domains\Admins\Actions\ReplyComments\DestroyReplyCommentAction;
use Domains\Admins\Actions\ReplyComments\StoreReplyCommentAction;
use Domains\Admins\Actions\ReplyComments\UpdateReplyCommentAction;
use Illuminate\Http\JsonResponse;

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

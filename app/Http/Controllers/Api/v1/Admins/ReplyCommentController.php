<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\ReplyCommentRequest;
use Domains\Admins\Actions\ReplyComments\StoreReplyCommentAction;
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

        return sendSuccessResponse(__('messages.create_data'), $replyComment);
    }

    public function update(ReplyCommentRequest $request, string $id, string $commentId, string $replyCommentId)
    {
    }
}

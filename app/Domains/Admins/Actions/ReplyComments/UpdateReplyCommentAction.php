<?php

namespace Domains\Admins\Actions\ReplyComments;

use App\Http\Requests\Admins\ReplyCommentRequest;
use App\Models\Post;
use App\Models\ReplyComment;
use Domains\Admins\DataTransferToObject\ReplyCommentData;

class UpdateReplyCommentAction
{
    public function __invoke(ReplyCommentRequest $request, string $postId, string $commentId, string $replayCommentId): ReplyComment
    {
        $attributes = unsetArrayEmptyParam(ReplyCommentData::fromRequest($request)->toArray());

        $post = Post::query()->where('status', true)->findOrFail($postId);

        $comment = $post->comments()->findOrFail($commentId);

        $replayComment = $comment->replyComments()->findOrFail($replayCommentId);

        $replayComment->update($attributes);

        return $replayComment;
    }
}

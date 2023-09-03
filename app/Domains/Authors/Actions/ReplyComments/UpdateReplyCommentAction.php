<?php

namespace Domains\Authors\Actions\ReplyComments;

use App\Http\Requests\Authors\ReplyCommentRequest;
use App\Models\Post;
use App\Models\ReplyComment;
use Domains\Authors\DataTransferToObject\ReplyCommentData;
use Illuminate\Auth\Access\AuthorizationException;

class UpdateReplyCommentAction
{
    public function __invoke(ReplyCommentRequest $request, string $postId, string $commentId, string $replayCommentId): ReplyComment
    {
        $attributes = unsetArrayEmptyParam(ReplyCommentData::fromRequest($request)->toArray());
        
        $post = Post::query()->where('status', true)->findOrFail($postId);

        $comment = $post->comments()->findOrFail($commentId);

        $replayComment = $comment->replyComments()->findOrFail($replayCommentId);

        if ($request->user()->cannot('update', $replayComment)) {
            throw new AuthorizationException();
        }

        $replayComment->update($attributes);

        return $replayComment;
    }
}

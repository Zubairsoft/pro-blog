<?php

namespace Domains\Admins\Actions\ReplyComments;

use App\Http\Requests\Admins\ReplyCommentRequest;
use App\Models\Post;
use App\Models\ReplyComment;
use Domains\Admins\DataTransferToObject\ReplyCommentData;

class StoreReplyCommentAction
{
    public function __invoke(ReplyCommentRequest $request, string $postId, string $commentId): ReplyComment
    {
        $attributes = unsetArrayEmptyParam(ReplyCommentData::fromRequest($request)->toArray());

        $post = Post::query()->where('status', true)->findOrFail($postId);

        $comment = $post->comments()->findOrFail($commentId);

        $replayComment = $comment->replyComments()->create($attributes);

        return $replayComment->fresh();
    }
}

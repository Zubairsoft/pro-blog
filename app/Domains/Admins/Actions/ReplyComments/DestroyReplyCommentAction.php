<?php

namespace Domains\Admins\Actions\ReplyComments;

use App\Http\Requests\Admins\ReplyCommentRequest;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;

class DestroyReplyCommentAction
{
    public function __invoke(ReplyCommentRequest $request, string $postId, string $commentId): void
    {
        $post = Post::query()->where('status', true)->findOrFail($postId);

        $comment = $post->comments()->findOrFail($commentId);

        $replayComments = $comment->replyComments()->whereIn('id', $request->ids)->get();

        $user = $request->user();

        foreach ($replayComments as $replayComment) {
            if ($user->cannot('destroy', $replayComment)) {
                throw new AuthorizationException();
            }
            $replayComment->delete();
        }
    }
}

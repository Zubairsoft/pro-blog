<?php

namespace Domains\Authors\Actions\Comments;

use App\Http\Requests\Authors\CommentRequest;
use App\Models\Comment;
use Domains\Repository\CommentRepository;

final class UpdateCommentAction
{
    public function __invoke(CommentRequest $request, $postId, $commentId): Comment
    {
        $comment = (new CommentRepository())->update($request, $postId, $commentId);

        return $comment;
    }
}

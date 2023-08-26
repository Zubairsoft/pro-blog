<?php

namespace Domains\Admins\Actions\Comments;

use App\Http\Requests\Admins\CommentRequest;
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

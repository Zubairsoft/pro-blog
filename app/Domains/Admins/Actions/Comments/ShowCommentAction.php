<?php

namespace Domains\Admins\Actions\Comments;

use App\Models\Comment;
use Domains\Repository\CommentRepository;

final class ShowCommentAction
{
    public function __invoke($postId, $commentId): Comment
    {
        $comment = (new CommentRepository())->show($postId, $commentId);

        return $comment;
    }
}

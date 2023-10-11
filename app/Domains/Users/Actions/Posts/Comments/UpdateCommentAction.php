<?php

namespace Domains\Users\Actions\Posts\Comments;

use App\Http\Requests\Users\Posts\CommentRequest;
use App\Models\Comment;
use Domains\Repository\CommentRepository;

final class UpdateCommentAction
{
    public function __invoke(CommentRequest $request, string $postId,string $commentId): Comment
    {
        $comment = (new CommentRepository())->update($request, $postId,$commentId);

        return $comment;
    }
}

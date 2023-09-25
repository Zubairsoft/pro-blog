<?php

namespace Domains\Admins\Actions\Comments;

use App\Http\Requests\Admins\CommentRequest;
use App\Models\Comment;
use Domains\Repository\CommentRepository;

final class StoreCommentAction
{
    public function __invoke(CommentRequest $request, string $postId): Comment
    {
        $comments = (new CommentRepository())->store($request, $postId);

        return $comments;
    }
}

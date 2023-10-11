<?php

namespace Domains\Users\Actions\Posts\Comments;

use App\Http\Requests\Users\Posts\CommentRequest;
use App\Models\Comment;
use Domains\Repository\CommentRepository;

final class StoreCommentAction
{
    public function __invoke(CommentRequest $request, string $postId): Comment
    {
        $comment = (new CommentRepository())->store($request, $postId);

        return $comment;
    }
}

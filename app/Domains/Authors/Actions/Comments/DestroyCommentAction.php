<?php

namespace Domains\Authors\Actions\Comments;

use App\Http\Requests\Admins\CommentRequest;
use Domains\Repository\CommentRepository;

final class DestroyCommentAction
{
    public function __invoke(CommentRequest $request, $postId): int
    {
        $comment = (new CommentRepository())->destroy($request, $postId);

        return $comment;
    }
}

<?php

namespace Domains\Admins\Actions\Comments;

use Domains\Repository\CommentRepository;
use Illuminate\Http\Request;

final class IndexCommentAction
{
    public function __invoke(Request $request, string $postId)
    {
        $comments = (new CommentRepository())->index($request, $postId);

        return $comments;
    }
}

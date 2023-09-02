<?php

namespace Domains\Admins\Actions\Comments;

use App\Http\Requests\Admins\CommentRequest;
use Domains\Repository\CommentRepository;

final class DestroyCommentAction
{
    public function __invoke(CommentRequest $request, $postId)
    {
        (new CommentRepository())->destroy($request, $postId);
    }
}

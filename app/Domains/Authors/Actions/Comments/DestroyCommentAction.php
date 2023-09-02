<?php

namespace Domains\Authors\Actions\Comments;

use App\Http\Requests\Authors\CommentRequest;
use Domains\Repository\CommentRepository;

final class DestroyCommentAction
{
    public function __invoke(CommentRequest $request, $postId): void
    {
        (new CommentRepository())->destroy($request, $postId);
    }
}

<?php

namespace Domains\Users\Actions\Posts\Comments;

use App\Http\Requests\Users\Posts\CommentRequest;
use App\Models\Comment;
use Domains\Repository\CommentRepository;

final class DestroyCommentAction
{
    public function __invoke(CommentRequest $request, string $postId): void
    {
        (new CommentRepository())->destroy($request, $postId);
    }
}

<?php

namespace Domains\Admins\Actions\Comments;

use App\Http\Resources\Admin\CommentResource;
use Domains\Repository\CommentRepository;
use Illuminate\Http\Request;

final class IndexCommentAction
{
    public function __invoke(Request $request, string $postId)
    {
        $comments = (new CommentRepository())->index($request, $postId);

        return CommentResource::collection($comments)->appends($request->query())->toArray();
    }
}

<?php

namespace Domains\Repository;

use App\Models\Comment;
use App\Models\Post;
use Domains\Authors\DataTransferToObject\CommentData;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements RepositoryMultiParmInterface
{
    public function index($request, $id)
    {
        $perPage = $request->input('per_page') ?? 10;

        $post = Post::query()->findOrFail($id);

        return $post->comments()->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function store($request, $id): Comment
    {
        $attributes = unsetArrayEmptyParam(CommentData::fromRequest($request)->toArray());

        $post = Post::query()->findOrFail($id);

        $auth = Auth::user();

        return $auth->comments()->create($attributes + ['post_id' => $post->id]);
    }

    public function show($id, $commentId): Comment
    {
        $post = Post::query()->findOrFail($id);

        return $post->comments()->findOrFail($commentId);
    }

    public function update($request, $id, $commentId): Comment
    {
        $attributes = unsetArrayEmptyParam(CommentData::fromRequest($request)->toArray());

        $post = Post::query()->findOrFail($id);

        $comment = $post->comments()->findOrFail($commentId);

        $comment->update($attributes);

        return $comment;
    }

    public function destroy($request, $id): int
    {
        $post = Post::query()->findOrFail($id);

        return $post->comments()->whereIn('id', $request->ids)->delete();
    }
}

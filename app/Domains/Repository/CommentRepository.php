<?php

namespace Domains\Repository;

use App\Models\Comment;
use App\Models\Post;
use Domains\Authors\DataTransferToObject\CommentData;
use Illuminate\Auth\Access\AuthorizationException;
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

        return $auth->comments()->with('userable')->create($attributes + ['post_id' => $post->id]);
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

        if ($request->user()->cannot('update', $comment)) {
            throw new AuthorizationException();
        }

        $comment->update($attributes);

        return $comment;
    }

    public function destroy($request, $id): void
    {
        $post = Post::query()->findOrFail($id);

        $comments =  $post->comments()->whereIn('id', $request->ids)->get();

        foreach ($comments as $comment) {
            if ($request->user()->cannot('destroy', $comment)) {
                throw new AuthorizationException();
            }
            $comment->delete();
        }
    }
}

<?php

namespace App\Http\Controllers\Api\v1\Authors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\CommentRequest;
use Domains\Authors\Actions\Comments\DestroyCommentAction;
use Domains\Authors\Actions\Comments\IndexCommentAction;
use Domains\Authors\Actions\Comments\ShowCommentAction;
use Domains\Authors\Actions\Comments\StoreCommentAction;
use Domains\Authors\Actions\Comments\UpdateCommentAction;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request, string $id)
    {
        $comments = (new IndexCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.get_data'), $comments);
    }

    public function store(CommentRequest $request, string $id)
    {
        $comments = (new StoreCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.create_data'), $comments);
    }

    public function show(string $id, string $commentId)
    {
        $comments = (new ShowCommentAction)($id, $commentId);

        return sendSuccessResponse(__('messages.get_data'), $comments);
    }

    public function update(CommentRequest $request, string $id, string $commentId)
    {
        $comments = (new UpdateCommentAction)($request, $id, $commentId);

        return sendSuccessResponse(__('messages.update_data'), $comments);
    }

    public function destroy(CommentRequest $request, string $id)
    {
        $comments = (new DestroyCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.delete_data'), $comments);
    }
}

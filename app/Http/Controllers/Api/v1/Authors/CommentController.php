<?php

namespace App\Http\Controllers\Api\v1\Authors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\CommentRequest;
use Domains\Authors\Actions\Comments\IndexCommentAction;
use Domains\Authors\Actions\Comments\StoreCommentAction;
use GuzzleHttp\Psr7\Request;

class CommentController extends Controller
{
    public function index(Request $request, string $id)
    {
        $comments = (new IndexCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.get_data'), $comments);
    }

    public function store(CommentRequest $request,string $id)
    {
        $comments = (new StoreCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.create_data'), $comments);
    }
}

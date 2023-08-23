<?php

namespace App\Http\Controllers\Api\v1\Authors;

use App\Http\Controllers\Controller;
use Domains\Authors\Actions\Comments\IndexCommentAction;
use GuzzleHttp\Psr7\Request;

class CommentController extends Controller
{
    public function index(Request $request, string $id)
    {
        $comments = (new IndexCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.get_data'), $comments);
    }
}

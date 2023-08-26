<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\CommentRequest;
use App\Http\Resources\Admins\Comments\CommentResource;
use Domains\Admins\Actions\Comments\DestroyCommentAction;
use Domains\Admins\Actions\Comments\IndexCommentAction;
use Domains\Admins\Actions\Comments\ShowCommentAction;
use Domains\Admins\Actions\Comments\StoreCommentAction;
use Domains\Admins\Actions\Comments\UpdateCommentAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Handle the incoming request for fetch all comments about specific post 
     * 
     * @param Request $request
     * @param mixed $id
     * 
     * @return JsonResponse
     */
    public function index(Request $request, $id): JsonResponse
    {
        $comments = (new IndexCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.get_data'), $comments);
    }

    /**
     * Handle the incoming request for store comment
     * 
     * @param CommentRequest $request
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function store(CommentRequest $request, string $id): JsonResponse
    {
        $comment = (new StoreCommentAction)($request, $id);

        return sendSuccessResponse(__('messages.create_data'),CommentResource::make($comment) );
    }

    /**
     * Handle the incoming request for show comment
     * 
     * @param string $id
     * @param string $commentId
     * 
     * @return JsonResponse
     */
    public function show(string $id, string $commentId): JsonResponse
    {
        $comment = (new ShowCommentAction)($id, $commentId);

        return sendSuccessResponse(__('messages.get_data'), CommentResource::make($comment));
    }

    /**
     * Handle the incoming request for update comment
     * 
     * @param string $id
     * @param string $commentId
     * 
     * @return JsonResponse
     */
    public function update(CommentRequest $request, string $id, string $commentId): JsonResponse
    {
        $comment = (new UpdateCommentAction)($request, $id, $commentId);

        return sendSuccessResponse(__('messages.update_data'), CommentResource::make($comment));
    }

    /**
     * Handle the incoming request for destroy comments
     * 
     * @param CommentRequest $request
     * 
     * @return JsonResponse
     */
    public function destroy(CommentRequest $request):JsonResponse
    {
        $comment=(new DestroyCommentAction)($request);

        return sendSuccessResponse(__('messages.destroy_data'),$comment);
    }
}

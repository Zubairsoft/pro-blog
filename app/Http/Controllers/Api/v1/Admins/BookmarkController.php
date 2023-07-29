<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\BookmarkRequest;
use Domains\Admins\Actions\Bookmarks\DestroyBookmarkAction;
use Domains\Admins\Actions\Bookmarks\IndexBookmarkAction;
use Domains\Admins\Actions\Bookmarks\ShowBookmarkAction;
use Domains\Admins\Actions\Bookmarks\StoreBookmarkAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $bookmarks = (new IndexBookmarkAction)($request);

        return sendSuccessResponse(__('messages.get_data'), $bookmarks);
    }

    public function store(BookmarkRequest $request): JsonResponse
    {
        $bookmark = (new StoreBookmarkAction)($request);

        return sendSuccessResponse(__('messages.create_data'), $bookmark);
    }


    public function show(string $id): JsonResponse
    {
        $bookmark = (new ShowBookmarkAction)($id);

        return sendSuccessResponse(__('messages.get_data'), $bookmark);
    }

    public function destroy(BookmarkRequest $request): JsonResponse
    {
        $bookmark = (new DestroyBookmarkAction)($request);

        return sendSuccessResponse(__('messages.delete_data'), $bookmark);
    }
}

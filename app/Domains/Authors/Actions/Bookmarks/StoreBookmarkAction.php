<?php

namespace Domains\Authors\Actions\Bookmarks;

use App\Http\Requests\Authors\BookmarkRequest;
use App\Models\Bookmark;
use Domains\Repository\BookmarkRepository;

final class StoreBookmarkAction
{
    public function __invoke(BookmarkRequest $request): Bookmark
    {
        $bookmark = (new BookmarkRepository)->store($request);

        return $bookmark;
    }
}

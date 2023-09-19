<?php

namespace Domains\Admins\Actions\Bookmarks;

use App\Http\Requests\Authors\BookmarkRequest;
use Domains\Repository\BookmarkRepository;

final class DestroyBookmarkAction
{
    public function __invoke(BookmarkRequest $request): int
    {
        $bookmark = (new BookmarkRepository)->destroy($request);

        return $bookmark;
    }
}

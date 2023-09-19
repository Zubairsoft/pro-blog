<?php

namespace Domains\Authors\Actions\Bookmarks;

use App\Models\Bookmark;
use Domains\Repository\BookmarkRepository;

final class ShowBookmarkAction
{
    public function __invoke(string $id): Bookmark
    {
        $bookmark = (new BookmarkRepository)->show($id);

        return $bookmark;
    }
}

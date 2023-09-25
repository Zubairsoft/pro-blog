<?php

namespace Domains\Admins\Actions\Bookmarks;

use App\Http\Resources\Admins\Bookmarks\BookmarkResource;
use Domains\Repository\BookmarkRepository;
use Illuminate\Http\Request;

final class IndexBookmarkAction
{
    public function __invoke(Request $request)
    {
        $bookmarks = (new BookmarkRepository)->index($request);

        return BookmarkResource::collection($bookmarks)->appends($request->query());
    }
}

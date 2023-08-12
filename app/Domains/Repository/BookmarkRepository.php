<?php

namespace Domains\Repository;

use Domains\Authors\DataTransferToObject\BookmarkData;
use Illuminate\Support\Facades\Auth;

class BookmarkRepository implements RepositoryInterface
{
    public function index($request)
    {
        $perPage = $request->input('per_page') ?? 10;

        $auth = Auth::user();

         return $auth->bookmarks()->with('post')->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function store($request)
    {
        $attributes = unsetArrayEmptyParam(BookmarkData::fromRequest($request)->toArray());

        $auth = Auth::user();

        return $auth->bookmarks()->firstOrCreate($attributes,$attributes);
    }

    public function show($id)
    {
        $auth = Auth::user();

        return $auth->bookmarks()->findOrFail($id);
    }

    public function update($request,$id)
    {
        
    }

    public function destroy($request)
    {
        
        $auth = Auth::user();

        return $auth->bookmarks()->whereIn('id', $request->ids)->delete();
    }


}

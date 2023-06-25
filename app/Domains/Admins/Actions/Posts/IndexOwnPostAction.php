<?php

namespace Domains\Admins\Actions\Posts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexOwnPostAction
{
    public function __invoke(Request $request)
    {
        $perPage = 10;

        $admin = Auth::user();

        $sortBy=$request->input('sortBy')??'desc';

        $query = $admin->posts()->search(['title_ar', 'title_en', 'description_ar', 'description_en'],$request->searchText)->paginate($perPage);

        return $query;
    }
}

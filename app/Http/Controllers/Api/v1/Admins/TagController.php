<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\TagRequest;
use Domains\Admins\Actions\Tags\DestroyTagAction;
use Domains\Admins\Actions\Tags\IndexTagAction;
use Domains\Admins\Actions\Tags\ShowTagAction;
use Domains\Admins\Actions\Tags\StoreTagAction;
use Domains\Admins\Actions\Tags\UpdateTagAction;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = (new IndexTagAction())($request);

        return sendSuccessResponse(__('messages.get_data'), $tags);
    }


    public function store(TagRequest $request)
    {

        $tag = (new StoreTagAction())($request);

        return sendSuccessResponse(__('messages.create_data'), $tag);
    }

    public function update(TagRequest $request , string $id)
    {
        $tag = (new UpdateTagAction())($request ,$id);

        return sendSuccessResponse(__('messages.update_data'), $tag);
    }

    public function show(string $id)
    {
        $tag = (new ShowTagAction)($id);

        return sendSuccessResponse(__('messages.get_data'), $tag);
    }

    public function destroy(TagRequest $request)
    {
        $tags = (new DestroyTagAction())($request);

        return sendSuccessResponse(__('messages.delete_data'), $tags);
    }
}

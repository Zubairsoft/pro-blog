<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\AuthorRequest;
use App\Http\Resources\Admins\AuthorResource;
use Domains\Admins\Actions\Authors\DestroyAuthorAction;
use Domains\Admins\Actions\Authors\IndexAuthorAction;
use Domains\Admins\Actions\Authors\ShowAuthorAction;
use Domains\Admins\Actions\Authors\StoreAuthorAction;
use Domains\Admins\Actions\Authors\UpdateAuthorAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Handel the incoming request for index author
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $authors = (new IndexAuthorAction)($request);

        return sendSuccessResponse(__('messages.get_data'), $authors);
    }

    /**
     * Handle the incoming request for store author
     * 
     * @param AuthorRequest $request
     * 
     * @return JsonResponse
     */
    public function store(AuthorRequest $request): JsonResponse
    {
        $author = (new StoreAuthorAction)($request);

        return sendSuccessResponse(__('messages.create_data'), AuthorResource::make($author));
    }

    /**
     * Handle the incoming request for show author
     * 
     * @param string $id
     * 
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $author = (new ShowAuthorAction())($id);

        return sendSuccessResponse(__('messages.get_data'), AuthorResource::make($author));
    }

    /**
     * Handle the incoming request for update author
     * 
     * @param AuthorRequest $request
     * 
     * @return JsonResponse
     */
    public function update(AuthorRequest $request, string $id): JsonResponse
    {
        $author = (new UpdateAuthorAction)($request, $id);

        return sendSuccessResponse(__('messages.update_data'), AuthorResource::make($author));
    }

    /**
     * Handle the incoming request for delete author
     * 
     * @param AuthorRequest $request
     * 
     * @return JsonResponse
     */
    public function  destroy(AuthorRequest $request): JsonResponse
    {
          (new DestroyAuthorAction)($request);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}

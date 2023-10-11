<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\UserRequest;
use App\Http\Resources\Admins\UserResource;
use Domains\Admins\Actions\Users\DestroyUserAction;
use Domains\Admins\Actions\Users\IndexUserAction;
use Domains\Admins\Actions\Users\ShowUserAction;
use Domains\Admins\Actions\Users\StoreUserAction;
use Domains\Admins\Actions\Users\UpdateUserAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Handle the incoming request for fetch all users
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $users = (new IndexUserAction)($request);

        return sendSuccessResponse(__('messages.get_data'), $users);
    }

    /**
     * Handle the incoming request for show all users
     *
     * @param string $id
     *
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $user = (new ShowUserAction)($id);

        return sendSuccessResponse(__('messages.get_data'), UserResource::make($user));
    }

    /**
     * Handle the incoming request for store user
     *
     * @param UserRequest $request
     *
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        $user = (new StoreUserAction)($request);

        return sendSuccessResponse(__('messages.create_data'), UserResource::make($user));
    }

}

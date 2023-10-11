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


}

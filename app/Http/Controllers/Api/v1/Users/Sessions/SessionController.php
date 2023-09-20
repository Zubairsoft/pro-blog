<?php

namespace App\Http\Controllers\Api\v1\Users\Sessions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Sessions\RegisterUserRequest;
use Domains\Users\Actions\LoginUserAction;
use Domains\Users\Actions\RegisterUserAction;
use Domains\Users\Actions\Sessions\LogoutUserAction;
use Illuminate\Http\JsonResponse;

class SessionController extends Controller
{
    /**
     * Handle the incoming request for register user
     *
     * @param RegisterUserRequest $request
     *
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $user = (new RegisterUserAction)($request);

        return sendSuccessResponse(__('auth.success_register'), $user);
    }

    /**
     * Handle the incoming request for for login user
     *
     * @param LoginUserAction $request
     *
     * @return JsonResponse
     */
    public function login(LoginUserAction $request): JsonResponse
    {
        $user = (new LoginUserAction)($request);

        return sendSuccessResponse(__('auth.success_login'), $user);
    }


    /**
     * Handle the incoming request for logout user
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        (new LogoutUserAction)();

        return sendSuccessResponse(__('auth.logout'));
    }
}

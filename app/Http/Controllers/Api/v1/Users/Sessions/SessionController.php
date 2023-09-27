<?php

namespace App\Http\Controllers\Api\v1\Users\Sessions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Sessions\ActivateAccountRequest;
use App\Http\Requests\Users\Sessions\ForgetPasswordRequest;
use App\Http\Requests\Users\Sessions\LoginUserRequest;
use App\Http\Requests\Users\Sessions\RegisterUserRequest;
use App\Http\Requests\Users\Sessions\ResendVerificationCodeRequest;
use App\Http\Requests\Users\Sessions\ResetPasswordRequest;
use Domains\Users\Actions\Sessions\ActivateAccountAction;
use Domains\Users\Actions\Sessions\ForgetPasswordAction;
use Domains\Users\Actions\Sessions\LoginUserAction;
use Domains\Users\Actions\Sessions\RegisterUserAction;
use Domains\Users\Actions\Sessions\LogoutUserAction;
use Domains\Users\Actions\Sessions\ResendVerificationCodeAction;
use Domains\Users\Actions\Sessions\ResetPasswordAction;
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
    public function login(LoginUserRequest $request): JsonResponse
    {
        $user = (new LoginUserAction)($request);

        return sendSuccessResponse(__('auth.success_login'), $user);
    }

    /**
     * Handle the incoming request for resend verification
     *
     * @param ResendVerificationCodeRequest $request
     *
     * @return JsonResponse
     */
    public function resendVerificationCode(ResendVerificationCodeRequest $request): JsonResponse
    {
        $email = (new ResendVerificationCodeAction)($request);

        return sendSuccessResponse(__('auth.send_verification_code'), $email);
    }


    /**
     * Handle the incoming request for activate user account
     *
     * @param ActivateAccountRequest $request
     *
     * @return JsonResponse
     */
    public function activateAccount(ActivateAccountRequest $request): JsonResponse
    {
        $email = (new ActivateAccountAction)($request);

        return sendSuccessResponse(__('auth.account_verified'), $email);
    }

    /**
     * Handle the incoming request for forget password
     *
     * @param ForgetPasswordRequest $request
     *
     * @return JsonResponse
     */
    public function forgetPassword(ForgetPasswordRequest $request): JsonResponse
    {
        $email = (new ForgetPasswordAction)($request);

        return sendSuccessResponse(__('passwords.forget_password'), $email);
    }

    /**
     * Handle the incoming request for reset password
     *
     * @param ResetPasswordRequest $request
     *
     * @return JsonResponse
     */
    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        (new ResetPasswordAction)($request);

        return sendSuccessResponse(__('passwords.reset'));
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

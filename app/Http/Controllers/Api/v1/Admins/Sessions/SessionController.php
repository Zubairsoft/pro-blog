<?php

namespace App\Http\Controllers\Api\v1\Admins\Sessions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\Sessions\ActivateAccountRequest;
use App\Http\Requests\Admins\Sessions\LoginAdminRequest;
use App\Http\Requests\Admins\Sessions\RegisterAdminRequest;
use  App\Http\Requests\Admins\Sessions\ResetPasswordRequest;
use App\Http\Requests\Admins\Sessions\SendResetPasswordRequest;
use App\Http\Requests\Admins\Sessions\SendVerificationCodeRequest;
use Domains\Admins\Actions\Sessions\ActivationAccountAction;
use Domains\Admins\Actions\Sessions\LoginAdminAction;
use Domains\Admins\Actions\Sessions\LogoutAdminAction;
use Domains\Admins\Actions\Sessions\RegisterAdminAction;
use Domains\Admins\Actions\Sessions\ResetPasswordAction;
use Domains\Admins\Actions\Sessions\SendRestPasswordAction;
use Domains\Admins\Actions\Sessions\SendVerificationCodeAction;

use Illuminate\Http\JsonResponse;

class SessionController extends Controller
{

    public function register(RegisterAdminRequest $request): JsonResponse
    {
        $admin = (new RegisterAdminAction)($request);

        return sendSuccessResponse(__('messages.create_data'), $admin);
    }

    public function login(LoginAdminRequest $request)
    {
        $admin = (new LoginAdminAction())($request);

        return sendSuccessResponse(__('auth.success_login'), $admin);
    }

    public function sendVerificationCode(SendVerificationCodeRequest $request)
    {
        (new SendVerificationCodeAction)($request);

        return sendSuccessResponse(__('auth.send_verification_code'));
    }

    public function ActivationAccount(ActivateAccountRequest $request)
    {
        $admin = (new ActivationAccountAction)($request);

        return sendSuccessResponse(__('auth.email_verified'), $admin);
    }

    public function sendRestPassword(SendResetPasswordRequest $request)
    {
         $restPassword=(new SendRestPasswordAction)($request);

         return sendSuccessResponse(__('passwords.password_reset_warning'),$restPassword);
    }

    public function restPassword(ResetPasswordRequest $request)
    {
       (new ResetPasswordAction)($request);

       return sendSuccessResponse(__('passwords.reset'));
    }


    public function logout()
    {
        (new LogoutAdminAction)();

        return sendSuccessResponse(__('auth.logout'));
    }
}

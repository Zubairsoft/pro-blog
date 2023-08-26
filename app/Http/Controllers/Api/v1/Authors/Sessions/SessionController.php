<?php

namespace App\Http\Controllers\Api\v1\Authors\Sessions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\Sessions\ActivateAccountRequest;
use App\Http\Requests\Authors\Sessions\loginRequest;
use App\Http\Requests\Authors\Sessions\RegisterAuthorRequest;
use App\Http\Requests\Authors\Sessions\ResetPasswordRequest;
use App\Http\Requests\Authors\Sessions\SendResetPasswordRequest;
use App\Http\Requests\Authors\Sessions\SendVerificationCodeRequest;
use Domains\Authors\Actions\Sessions\LogoutAuthorAction;
use Domains\Authors\Actions\Sessions\ActivateAccountAction;
use Domains\Authors\Actions\Sessions\LoginAuthorAction;
use Domains\Authors\Actions\Sessions\RegisterAuthorAction;
use Domains\Authors\Actions\Sessions\ResetPasswordAction;
use Domains\Authors\Actions\Sessions\SendRestPasswordAction;
use Domains\Authors\Actions\Sessions\SendVerificationCodeAction;

class SessionController extends Controller
{
    public function register(RegisterAuthorRequest $request)
    {
        $author = (new RegisterAuthorAction)($request);

        return sendSuccessResponse(__('auth.success_register'), $author);
    }

    public function login(loginRequest $request)
    {
        $author = (new LoginAuthorAction)($request);

        return sendSuccessResponse(__('auth.success_login'), $author);
    }

    public function sendVerificationCode(SendVerificationCodeRequest $request)
    {
        $sendVerificationCode = (new SendVerificationCodeAction)($request);

        return sendSuccessResponse(__('auth.send_verification_code'), $sendVerificationCode);
    }

    public function activateAccount(ActivateAccountRequest $request)
    {
        $activateAccount = (new ActivateAccountAction)($request);

        return sendSuccessResponse(__('auth.account_verified'), $activateAccount);
    }

    public function sendRestPassword(SendResetPasswordRequest $request)
    {
         $restPassword=(new SendRestPasswordAction)($request);

         return sendSuccessResponse(__('passwords.sent'),$restPassword);
    }

    public function restPassword(ResetPasswordRequest $request)
    {
       (new ResetPasswordAction)($request);

       return sendSuccessResponse(__('passwords.reset'));
    }

    public function logout()
    {
        (new LogoutAuthorAction)();
        return sendSuccessResponse(__('auth.logout'));
    }
}

<?php

namespace App\Http\Controllers\Api\v1\Admins\Sessions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\Sessions\ActivateAccountRequest;
use App\Http\Requests\Admins\Sessions\LoginAdminRequest;
use App\Http\Requests\Admins\Sessions\RegisterAdminRequest;
use App\Http\Requests\Admins\Sessions\SendVerificationCodeRequest;
use App\Models\Admin;
use Domains\Admins\Actions\Sessions\ActivationAccountAction;
use Domains\Admins\Actions\Sessions\LoginAdminAction;
use Domains\Admins\Actions\Sessions\LogoutAdminAction;
use Domains\Admins\Actions\Sessions\RegisterAdminAction;
use Domains\Admins\Actions\Sessions\SendVerificationCodeAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function register(RegisterAdminRequest $request): JsonResponse
    {
        $admin = (new RegisterAdminAction)($request);

        return sendSuccessResponse(__('messages.create_data'), $admin);
    }

    public function login(LoginAdminRequest $request)
    {
        Auth::shouldUse(config('auth.admin-web-guard'));

        if (!Auth::attempt($request->validated())) {
            return sendFailedResponse(__('auth.failed'), null, 422);
        }

        $admin = Auth::user();


        if (!$admin->isActivatedAccount()) {
            return sendFailedResponse(__('auth.verify_email'), null, 422);
        }

        $admin['token'] = $admin->createToken('adminAccessToken')->plainTextToken;

        return sendSuccessResponse(__('auth.success_login'), $admin);
    }

    public function sendVerificationCode(SendVerificationCodeRequest $request)
    {
        (new SendVerificationCodeAction)($request);

        return sendSuccessResponse('send');
    }

    public function ActivationAccount(ActivateAccountRequest $request)
    {
        $admin = (new ActivationAccountAction)($request);

        return sendSuccessResponse();
    }



    public function logout()
    {
        (new LogoutAdminAction)();

        return sendSuccessResponse(__('auth.logout'));
    }
}
<?php

namespace Domains\Admins\Actions\Sessions;

use App\Http\Requests\Admins\Sessions\LoginAdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginAdminAction
{
    public function __invoke(LoginAdminRequest $request)
    {
        Auth::shouldUse(config('auth.admin-web-guard'));
        if (!Auth::attempt($request->validated())) {
            return sendFailedResponse(__('auth.failed'), null, 422);
        }

        $admin = Auth::user();

        if (!$admin->isActivatedAccount()) {
            return sendFailedResponse(__('auth.verify_email'), null, 422);
        }

        $admin['token'] = $admin->createAccessTokens('adminAccessToken')->plainText;

        return $admin;
    }
}

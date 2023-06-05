<?php

namespace Domains\Admins\Actions\Sessions;

use App\Http\Requests\Admins\Sessions\SendVerificationCodeRequest;
use App\Models\Admin;

class SendVerificationCodeAction
{
    public function __invoke(SendVerificationCodeRequest $request)
    {
        $admin = Admin::query()->where('email', $request->email)->firstOrFail();

        if ($admin->isActivatedAccount()) {
            return sendFailedResponse(__('auth.not_verified'), null, 422);
        }

        $admin->generateOtpActivation($admin->email);
    }
}

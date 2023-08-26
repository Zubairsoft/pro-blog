<?php

namespace Domains\Admins\Actions\Sessions;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Admins\Sessions\ActivateAccountRequest;
use App\Models\Admin;
use App\Models\OtpActivation;
use Illuminate\Support\Carbon;

class ActivationAccountAction
{
    public function __invoke(ActivateAccountRequest $request)
    {
        $otpActivation = OtpActivation::query()->where([['type', '=', Admin::class], ['email', '=', $request->email]])->first();

        if (!$otpActivation) {
            throw new LogicException(__('auth.invalid_token'));
        }

        if (Carbon::parse($otpActivation->created_at)->addHours(24)->isPast()) {
            $otpActivation->delete();
            throw new LogicException(__('auth.expired_otp'));
        }

        $admin = Admin::query()->whereEmail($otpActivation->email)->firstOrFail();

        $admin->setAsActivateAccount();

        $otpActivation->delete();

        return $admin->email;
    }
}

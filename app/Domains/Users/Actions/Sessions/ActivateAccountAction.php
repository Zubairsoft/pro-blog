<?php

namespace Domains\Users\Actions\Sessions;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Users\Sessions\ActivateAccountRequest;
use App\Models\OtpActivation;
use App\Models\User;
use Illuminate\Support\Carbon;

class ActivateAccountAction

{
    public function __invoke(ActivateAccountRequest $request)
    {
        $otpActivation = OtpActivation::query()
        ->where([['type', '=', User::class], ['email', '=', $request->email],['otp','=',$request->otp]])->first();

        if (!$otpActivation) {
            throw new LogicException(__('auth.invalid_token'));
        }

        if (Carbon::parse($otpActivation->created_at)->addHours(24)->isPast()) {
            $otpActivation->delete();
            throw new LogicException(__('auth.expired_otp'));
        }

        $user = User::query()->whereEmail($request->email)->firstOrFail();

        $user->setAsActivateAccount();

        $otpActivation->delete();

        return $user->email;
    }
}

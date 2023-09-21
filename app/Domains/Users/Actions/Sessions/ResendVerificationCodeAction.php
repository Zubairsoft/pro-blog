<?php

namespace Domains\Users\Actions\Sessions;

use App\Http\Requests\Users\Sessions\ResendVerificationCodeRequest;
use App\Models\OtpActivation;
use App\Models\User;

class ResendVerificationCodeAction

{
    public function __invoke(ResendVerificationCodeRequest $request)
    {
        $otpActivation = OtpActivation::query()->where([['email', '=', $request->email], ['type', '=', User::class]])->first();

        if ($otpActivation) {

            if ($otpActivation->hourIsPast()) {
                $otpActivation->delete();
                OtpActivation::generateOtpActivation($request->email, User::class);
            }

            return $request->email;
        }
        OtpActivation::generateOtpActivation($request->email, User::class);

        return $request->email;
    }
}

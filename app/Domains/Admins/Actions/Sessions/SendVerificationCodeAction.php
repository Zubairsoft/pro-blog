<?php

namespace Domains\Admins\Actions\Sessions;

use App\Http\Requests\Admins\Sessions\SendVerificationCodeRequest;
use App\Models\Admin;
use App\Models\OtpActivation;
use Carbon\Carbon;

class SendVerificationCodeAction
{
    public function __invoke(SendVerificationCodeRequest $request)
    {
        $otpActivation = OtpActivation::query()->where([['email','=',$request->email],['type','=',Admin::class]])->first();

        if ($otpActivation) {

            if (Carbon::parse($otpActivation->created_at)->addHour()->isPast()) {
                $otpActivation->delete();
                OtpActivation::generateOtpActivation($request->email, Admin::class);
            }

            return $request->email;
        }
        OtpActivation::generateOtpActivation($request->email, Admin::class);

        return $request->email;

        // TODO send email for verification code
    }
}

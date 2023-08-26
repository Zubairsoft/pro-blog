<?php

namespace Domains\Authors\Actions\Sessions;

use App\Http\Requests\Authors\Sessions\SendVerificationCodeRequest;
use App\Models\Author;
use App\Models\OtpActivation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SendVerificationCodeAction
{
    public function __invoke(SendVerificationCodeRequest $request)
    {
        $otpActivation = OtpActivation::query()->whereEmail($request->email)->first();

        if ($otpActivation) {

            if (Carbon::parse($otpActivation->created_at)->addHour()->isPast()) {
                $otpActivation->delete();
                OtpActivation::generateOtpActivation($request->email, Author::class);
            }

            return $request->email;
        }
        OtpActivation::generateOtpActivation($request->email, Author::class);

        return $request->email;
    }
}

<?php

namespace Domains\Authors\Actions\Sessions;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Authors\Sessions\ActivateAccountRequest;
use App\Models\Author;
use App\Models\OtpActivation;
use Illuminate\Support\Carbon;

class ActivateAccountAction
{
    public function __invoke(ActivateAccountRequest $request)
    {
        $otpActivation = OtpActivation::query()
        ->where([['type', '=', Author::class], ['email', '=', $request->email],['otp','=',$request->otp]])->first();

        if (!$otpActivation) {
            throw new LogicException(__('auth.invalid_token'));
        }

        if (Carbon::parse($otpActivation->created_at)->addHours(24)->isPast()) {
            $otpActivation->delete();
            throw new LogicException(__('auth.expired_otp'));
        }

        $author = Author::query()->whereEmail($request->email)->firstOrFail();

        $author->setAsActivateAccount();

        $otpActivation->delete();

        return $author->email;
    }
}

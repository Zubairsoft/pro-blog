<?php

namespace Domains\Admins\Actions\Sessions;

use App\Http\Requests\Admins\Sessions\ActivateAccountRequest;
use App\Models\OtpActivation;
use Illuminate\Support\Carbon;

class ActivationAccountAction
{
    public function __invoke(ActivateAccountRequest $request)
    {
        $otpActivation = OtpActivation::query()->where('otp', $request->otp)->firstOrFail();

        if (Carbon::parse($otpActivation->created_at)->addHours(24)->isPast()) {
            $otpActivation->delete();
        }

        $admin = $otpActivation->activatable;

        if ($admin->isActivatedAccount()) {
            //do sum thing
        }

        $admin->setAsActivateAccount();

        return $admin->email;
        
    }
}

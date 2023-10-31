<?php

namespace App\Observers;

use App\Jobs\SendEmail;
use App\Mail\Authors\ActivateAccount as AuthorsActivateAccount;
use App\Mail\Users\ActivateAccount;
use App\Models\Author;
use App\Models\OtpActivation;
use App\Models\User;

class OtpActivationObserver
{
    /**
     * Handle the OtpActivation "created" event.
     */
    public function created(OtpActivation $otpActivation): void
    {
        switch ($otpActivation->type) {
            case User::class:
                $user = User::query()->whereEmail($otpActivation->email)->firstOrFail();

                SendEmail::dispatch(new ActivateAccount($user, $otpActivation->otp));
                break;

            case Author::class:
                $author = Author::query()->whereEmail($otpActivation->email)->firstOrFail();

                SendEmail::dispatch(new AuthorsActivateAccount($author, $otpActivation->otp));
                break;
        }
    }
}

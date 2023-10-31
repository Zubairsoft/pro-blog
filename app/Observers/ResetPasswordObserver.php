<?php

namespace App\Observers;

use App\Jobs\SendEmail;
use App\Mail\Admins\ForgetPasswordMail as AdminsForgetPasswordMail;
use App\Mail\Authors\ForgetPasswordMail as AuthorsForgetPasswordMail;
use App\Mail\Users\ForgetPasswordMail;
use App\Models\Admin;
use App\Models\Author;
use App\Models\ResetPassword;
use App\Models\User;
use Domains\Supports\Enums\UserEnum;

class ResetPasswordObserver
{
    /**
     * Handle the ResetPassword "created" event.
     */
    public function created(ResetPassword $resetPassword): void
    {
        switch ($resetPassword->type) {
            case UserEnum::USER:

                SendEmail::dispatch(new ForgetPasswordMail($resetPassword));
                break;

            case UserEnum::AUTHOR:

                SendEmail::dispatch(new AuthorsForgetPasswordMail($resetPassword));
                break;

            case UserEnum::ADMIN:

                SendEmail::dispatch(new AdminsForgetPasswordMail($resetPassword));
                break;
        }
    }
}

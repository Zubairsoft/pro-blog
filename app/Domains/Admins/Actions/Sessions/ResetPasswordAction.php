<?php

namespace Domains\Admins\Actions\Sessions;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Admins\Sessions\ResetPasswordRequest;
use App\Models\Admin;
use App\Models\ResetPassword;
use Domains\Supports\Enums\UserEnum;
use Illuminate\Support\Carbon;

final class ResetPasswordAction
{
    public function __invoke(ResetPasswordRequest  $request)
    {
        $restPassword = ResetPassword::query()->where([['email', '=', $request->email], ['token', '=', $request->token], ['type', '=', UserEnum::ADMIN]])->first();

        if (!$restPassword) {
            throw new LogicException(__('passwords.token'));
        }

        if (Carbon::parse($restPassword->created_at)->addHours(24)->isPast()) {
            $restPassword->delete();
            throw new LogicException(__('passwords.expire_token'));
        }

        $admin = Admin::query()->where('email', $restPassword->email)->firstOrFail();

        $admin->update(['password' => $request->password]);
        $restPassword->delete();
    }
}

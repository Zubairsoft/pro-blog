<?php

namespace Domains\Admins\Actions\Sessions;

use App\Http\Requests\Admins\Sessions\SendResetPasswordRequest;
use App\Models\Admin;
use App\Models\ResetPassword;
use Domains\Supports\Enums\UserEnum;
use Illuminate\Support\Carbon;

use Illuminate\Support\Str;


final class SendRestPasswordAction
{
    public function __invoke(SendResetPasswordRequest $request)
    {
        $admin = Admin::query()->where('email', $request->email)->firstOrFail();

        $restPassword = ResetPassword::query()->where([['email', '=', $admin->email], ['type', UserEnum::ADMIN]])->first();

        if ($restPassword) {
            if (!Carbon::parse($restPassword->created_at)->addMinutes(3)->isPast()) {
                return $admin->email;
            }

            $restPassword->delete();
        }

        $restPassword = ResetPassword::query()->create($request->validated() + [
            'type' => UserEnum::ADMIN,
            'token' => Str::random(20),
        ]);

        return $restPassword->email;
    }
}

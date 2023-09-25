<?php

namespace Domains\Users\Actions\Sessions;

use App\Http\Requests\Users\Sessions\ForgetPasswordRequest;
use App\Models\ResetPassword;
use App\Models\User;
use Domains\Supports\Enums\UserEnum;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class ForgetPasswordAction

{
    public function __invoke(ForgetPasswordRequest $request)
    {
        $restPassword = ResetPassword::query()->where([['email', '=', $request->email], ['type',User::class]])->first();

        if ($restPassword) {
            if (!Carbon::parse($restPassword->created_at)->addMinutes(3)->isPast()) {
                return $$request->email;
            }

            $restPassword->delete();
        }

        $restPassword = ResetPassword::query()->create($request->validated() + [
            'type' => UserEnum::USER,
            'token' => Str::random(20),
        ]);

        return $restPassword->email;
    }
}

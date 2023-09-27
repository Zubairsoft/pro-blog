<?php

namespace Domains\Users\Actions\Sessions;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Users\Sessions\ResetPasswordRequest;
use App\Models\ResetPassword;
use App\Models\User;
use Domains\Supports\Enums\UserEnum;
use Illuminate\Support\Carbon;


class ResetPasswordAction
{
    public function __invoke(ResetPasswordRequest $request)
    {
        $restPassword = ResetPassword::query()->where([['email','=',$request->email],['token','=',$request->token],['type','=',UserEnum::USER]])->first();


        if (!$restPassword) {
            throw new LogicException(__('passwords.token'));
        }

        if (Carbon::parse($restPassword->created_at)->addHours(24)->isPast()) {
            $restPassword->delete();
            throw new LogicException(__('passwords.expire_token'));
        }

        $user = User::query()->where('email', $restPassword->email)->firstOrFail();

        $user->update(['password' => $request->password]);

        $restPassword->delete();
    }
}

<?php

namespace Domains\Authors\Actions\Sessions;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Authors\Sessions\ResetPasswordRequest;
use App\Models\Author;
use App\Models\ResetPassword;
use Domains\Supports\Enums\UserEnum;
use Illuminate\Support\Carbon;

final class ResetPasswordAction
{
    public function __invoke(ResetPasswordRequest  $request)
    {
        $restPassword = ResetPassword::query()->where([['email', '=', $request->email], ['token', '=', $request->token], ['type', '=', UserEnum::AUTHOR]])->first();

        if (!$restPassword) {
            throw new LogicException(__('passwords.token'));
        }

        if (Carbon::parse($restPassword->created_at)->addHours(24)->isPast()) {
            $restPassword->delete();
            throw new LogicException(__('passwords.expire_token'));
        }

        $author = Author::query()->where('email', $restPassword->email)->firstOrFail();

        $author->update(['password' => $request->password]);
        $restPassword->delete();
    }
}

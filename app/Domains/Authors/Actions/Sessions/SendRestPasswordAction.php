<?php

namespace Domains\Authors\Actions\Sessions;

use App\Http\Requests\Authors\Sessions\SendResetPasswordRequest;
use App\Models\Author;
use App\Models\ResetPassword;
use Domains\Supports\Enums\UserEnum;
use Illuminate\Support\Carbon;

use Illuminate\Support\Str;


final class SendRestPasswordAction
{
    public function __invoke(SendResetPasswordRequest $request)
    {
        $author = Author::query()->where('email', $request->email)->firstOrFail();

        $restPassword = ResetPassword::query()->where([['email', '=', $author->email], ['type', UserEnum::AUTHOR]])->first();

        if ($restPassword) {
            if (!Carbon::parse($restPassword->created_at)->addMinutes(3)->isPast()) {
                return $author->email;
            }

            $restPassword->delete();
        }

        $restPassword = ResetPassword::query()->create($request->validated() + [
            'type' => UserEnum::AUTHOR,
            'token' => Str::random(20),
            'created_at' => now()
        ]);

        return $restPassword->email;
    }
}

<?php

namespace Domains\Users\Actions\Sessions;

use App\Http\Requests\Users\Sessions\RegisterUserRequest;
use App\Models\User;
use Domains\Users\DataTransferToObject\UserData;
use Domains\Supports\Enums\RoleEnum;

final class RegisterUserAction
{
    public function __invoke(RegisterUserRequest $request):User
    {
        $attributes = unsetArrayEmptyParam(UserData::fromRequest($request)->toArray());

        $user = User::query()->create($attributes);

        $user->AddImageFromRequestIfExists($request, 'avatar', 'avatar');

        $user->assignRole(RoleEnum::USER);

        resendVerificationCode($user);

        return $user;

    }
}

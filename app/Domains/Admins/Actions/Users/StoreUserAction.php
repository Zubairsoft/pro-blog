<?php

namespace Domains\Admins\Actions\Users;

use App\Http\Requests\Admins\UserRequest;
use App\Models\User;
use Domains\Admins\DataTransferToObject\UserData;
use Domains\Supports\Enums\RoleEnum;
use Illuminate\Support\Facades\Auth;

final class StoreUserAction
{
    public function __invoke(UserRequest $request): User
    {
        Auth::shouldUse(config('auth.user-web-guard'));
        
        $attributes = unsetArrayEmptyParam(UserData::fromRequest($request)->toArray());

        $user = User::query()->create($attributes);

        $user->AddImageFromRequestIfExists($request, 'avatar', 'avatar');

        $user->assignRole(RoleEnum::USER);

        return $user;
    }
}

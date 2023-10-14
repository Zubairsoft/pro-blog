<?php

namespace Domains\Admins\Actions\Users;

use App\Http\Requests\Admins\UserRequest;
use App\Models\User;
use Domains\Admins\DataTransferToObject\UserData;

final class UpdateUserAction
{
    public function __invoke(UserRequest $request, string $id): User
    {
        $attributes = unsetArrayEmptyParam(UserData::fromRequest($request)->toArray());

        $user = User::query()->findOrFail($id);

        $user->update($attributes);

        $user->AddImageFromRequestIfExists($request, 'avatar', 'avatar');

        return $user;
    }
}

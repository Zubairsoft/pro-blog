<?php

namespace Domains\Admins\Actions\Users;

use App\Http\Requests\Admins\UserRequest;
use App\Models\User;

final class DestroyUserAction
{
    public function __invoke(UserRequest $request)
    {
        User::query()->whereIn('id', $request->ids)->delete();
    }
}

<?php

namespace Domains\Admins\Actions\Users;

use App\Models\User;

final class ShowUserAction
{
    public function __invoke(string $id): User
    {
        return User::query()->findOrFail($id);
    }
}

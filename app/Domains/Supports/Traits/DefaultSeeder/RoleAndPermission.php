<?php

namespace Domains\Supports\Traits\DefaultSeeder;

use Domains\Supports\Enums\RoleEnum;

trait RoleAndPermission
{
    private function roles(): array
    {
        $roles = RoleEnum::getValues();
        return collect($roles)->map(fn ($role) => [
            'name' => $role,
            'guard_name' => RoleEnum::fromValue($role)->in([RoleEnum::SUPER_ADMIN , RoleEnum::ADMIN])?config('auth.admin-web-guard'):
           ( RoleEnum::fromValue($role)->is(RoleEnum::AUTHOR)?config('auth.author-web-guard'):config('auth.user-web-guard'))
        ])->toArray();
    }
}

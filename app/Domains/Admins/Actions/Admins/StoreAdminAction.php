<?php

namespace Domains\Admins\Actions\Admins;

use App\Http\Requests\Admins\AdminRequest;
use App\Models\Admin;
use Domains\Admins\DataTransferToObject\AdminData;
use Domains\Supports\Enums\RoleEnum;
use Illuminate\Support\Facades\Auth;

final class StoreAdminAction
{
    public function __invoke(AdminRequest $request): Admin
    {
        Auth::shouldUse(config('auth.admin-web-guard'));
        
        $attributes = unsetArrayEmptyParam(AdminData::fromRequest($request)->toArray());

        $admin = Admin::query()->create($attributes + ['email_verified_at' => now()]);

        $admin->assignRole(RoleEnum::ADMIN);

        return $admin;
    }
}

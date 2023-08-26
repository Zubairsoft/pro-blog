<?php

namespace Domains\Admins\Actions\Sessions;

use App\Http\Requests\Admins\Sessions\RegisterAdminRequest;
use App\Models\Admin;
use Domains\Admins\DataTransferToObject\AdminData;
use Domains\Supports\Enums\RoleEnum;

class RegisterAdminAction
{
    public function __invoke(RegisterAdminRequest $request): Admin
    {
        $adminAttributes = unsetArrayEmptyParam(AdminData::fromRequest($request)->toArray());

        $admin = Admin::query()->create($adminAttributes);

        $admin->assignRole(RoleEnum::ADMIN);

        if ($request->avatar?->isFile()) {
            $admin->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        return $admin->load('media');
    }
}

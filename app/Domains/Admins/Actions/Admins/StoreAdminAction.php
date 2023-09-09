<?php

namespace Domains\Admins\Actions\Admins;

use App\Http\Requests\Admins\AdminRequest;
use App\Models\Admin;
use Domains\Admins\DataTransferToObject\AdminData;
use Domains\Supports\Enums\RoleEnum;

final class StoreAdminAction
{
    public function __invoke(AdminRequest $request): Admin
    {
        $attributes = unsetArrayEmptyParam(AdminData::fromRequest($request)->toArray());

        $admin = Admin::query()->create($attributes);


        return $admin;
    }
}

<?php

namespace Domains\Admins\Actions\Admins;

use App\Http\Requests\Admins\AdminRequest;
use App\Models\Admin;
use Domains\Admins\DataTransferToObject\AdminData;

final class UpdateAdminAction
{
    public function __invoke(AdminRequest $request, string $id): Admin
    {
        $attributes = unsetArrayEmptyParam(AdminData::fromRequest($request)->toArray());

        $admin = Admin::query()->firstOrFail($id);

        $admin->update($attributes);

        return $admin;
    }
}

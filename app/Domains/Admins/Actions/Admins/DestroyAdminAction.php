<?php

namespace Domains\Admins\Actions\Admins;

use App\Http\Requests\Admins\AdminRequest;
use App\Models\Admin;

final class DestroyAdminAction
{
    public function __invoke(AdminRequest $request): void
    {
        Admin::query()->whereIn('id', $request->ids)->delete();
    }
}

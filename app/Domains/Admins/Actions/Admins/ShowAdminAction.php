<?php

namespace Domains\Admins\Actions\Admins;

use App\Models\Admin;


final class ShowAdminAction
{
    public function __invoke(string $id): Admin
    {
        return Admin::query()->findOrFail($id);
    }
}

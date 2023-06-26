<?php

namespace Domains\Admins\Specification\Admin;

use App\Models\Admin;

class IsActiveSpecification implements AdminSpecificationInterface
{

    public function isAllowed(Admin $admin): bool
    {
        return $admin->is_active;
    }
}

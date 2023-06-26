<?php

namespace Domains\Admins\Specification\Admin;

use App\Models\Admin;

class IsVerifiedEmailSpecification implements AdminSpecificationInterface
{
    public function isAllowed(Admin $admin): bool
    {
        return $admin->isActivatedAccount();
    }
}

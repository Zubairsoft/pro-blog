<?php

namespace Domains\Admins\Specification\Admin;

use App\Models\Admin;

interface AdminSpecificationInterface
{
    public function isAllowed(Admin $admin):bool;
}
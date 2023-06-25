<?php

namespace Domains\Admins\Specification\Admin;

use App\Models\Admin;

class IsActiveSpecification implements AdminSpecificationInterface
{

    public function isAllowed(Admin $author): bool
    {
        return $author->is_active;
    }
}

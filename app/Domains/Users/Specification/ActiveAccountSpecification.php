<?php

namespace Domains\Users\Specification;

use App\Models\User;

class ActiveAccountSpecification implements UserSpecificationInterface
{

    public function isAllowed(User $user): bool
    {
        return $user->is_active;
    }
}

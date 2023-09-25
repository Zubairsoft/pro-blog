<?php

namespace Domains\Users\Specification;

use App\Models\User;

class VerifiedEmailSpecification implements UserSpecificationInterface
{

    public function isAllowed(User $user): bool
    {
        return $user->isActivatedAccount();
    }
}

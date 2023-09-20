<?php

namespace Domains\Users\Specification;

use App\Models\User;

interface UserSpecificationInterface
{
    public function isAllowed(User $user): bool;
}

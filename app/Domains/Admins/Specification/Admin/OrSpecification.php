<?php

namespace Domains\Admins\Specification\Admin;

use App\Models\Admin;

class OrSpecification implements AdminSpecificationInterface
{
    private array $specifications;
    public function __construct(AdminSpecificationInterface ...$adminSpecification)
    {
        $this->specifications = $adminSpecification;
    }

    public function isAllowed(Admin $admin): bool
    {
        foreach ($this->specifications as $specification) {

            if ($specification->isAllowed($admin)) {
                return true;
            }
        }

        return false;
    }
}

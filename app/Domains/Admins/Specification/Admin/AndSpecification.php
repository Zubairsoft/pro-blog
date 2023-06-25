<?php

namespace Domains\Admins\Specification\Admin;

use App\Models\Admin;

class AndSpecification implements AdminSpecificationInterface
{
    private array $specifications;
    public function __construct(AdminSpecificationInterface ...$adminSpecification)
    {
        $this->specifications = $adminSpecification;
    }

    public function isAllowed(Admin $author): bool
    {
        foreach ($this->specifications as $specification) {

            if (!$specification->isAllowed($author)) {
                return false;
            }
        }

        return true;
    }
}

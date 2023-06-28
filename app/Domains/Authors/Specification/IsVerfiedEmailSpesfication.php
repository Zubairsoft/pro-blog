<?php

namespace Domains\Authors\Specification;

use App\Models\Author;

class IsVerifiedEmailSpecification implements AuthorSpecificationInterface
{

    public function isAllowed(Author $author): bool
    {
        return $author->isActivatedAccount();
    }
}

<?php

namespace Domains\Authors\Specification;

use App\Models\Author;

class IsActiveSpecification implements AuthorSpecificationInterface
{

    public function isAllowed(Author $author): bool
    {
        return $author->is_active;
    }
}

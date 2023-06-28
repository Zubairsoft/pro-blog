<?php

namespace Domains\Authors\Specification;

use App\Models\Author;

interface AuthorSpecificationInterface
{
    public function isAllowed(Author $author): bool;
}

<?php

namespace Domains\Authors\Specification;

use App\Models\Author;

class AndSpecification implements AuthorSpecificationInterface
{
    private array $specifications;
    public function __construct(AuthorSpecificationInterface ...$authorSpecification)
    {
        $this->specifications = $authorSpecification;
    }

    public function isAllowed(Author $author): bool
    {
        foreach ($this->specifications as $specification) {

            if (!$specification->isAllowed($author)) {
                return false;
            }
        }

        return true;
    }
}

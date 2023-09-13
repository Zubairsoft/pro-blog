<?php

namespace Domains\Admins\Actions\Authors;

use App\Models\Author;

final class ShowAuthorAction
{
    public function __invoke(string $id): Author
    {
        return Author::query()->findOrFail($id);
    }
}

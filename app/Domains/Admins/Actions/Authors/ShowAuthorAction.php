<?php

namespace Domains\Admins\Actions\Authors;

use App\Models\Admin;
use App\Models\Author;

final class ShowAuthorAction
{
    public function __invoke(string $id): Admin
    {
        return Author::query()->findOrFail($id);
    }
}

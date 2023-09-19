<?php

namespace Domains\Admins\Actions\Authors;

use App\Http\Requests\Admins\AuthorRequest;
use App\Models\Admin;
use App\Models\Author;

final class DestroyAuthorAction
{
    public function __invoke(AuthorRequest $request): void
    {
        Author::query()->whereIn('id', $request->ids)->delete();
    }
}

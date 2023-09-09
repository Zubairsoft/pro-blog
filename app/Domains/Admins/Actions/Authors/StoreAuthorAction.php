<?php

namespace Domains\Admins\Actions\Authors;

use App\Http\Requests\Admins\AuthorRequest;
use App\Models\Author;
use Domains\Admins\DataTransferToObject\AuthorData;
use Domains\Supports\Enums\RoleEnum;

final class StoreAuthorAction
{
    public function __invoke(AuthorRequest $request): Author
    {
        $attributes = unsetArrayEmptyParam(AuthorData::fromRequest($request)->toArray());

        $author = Author::query()->create($attributes);

        $author->assignRole(RoleEnum::AUTHOR);

        return $author;
    }
}

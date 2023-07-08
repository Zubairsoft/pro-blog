<?php

namespace Domains\Authors\Actions\Sessions;

use App\Http\Requests\Authors\Sessions\RegisterAuthorRequest;
use App\Models\Author;
use Domains\Authors\DataTransferToObject\Sessions\RegisterAuthorData;
use Domains\Supports\Enums\RoleEnum;

class RegisterAuthorAction
{
    public function __invoke(RegisterAuthorRequest $request): Author
    {
        $attributes = unsetArrayEmptyParam(RegisterAuthorData::fromRequest($request)->toArray());

        $author = Author::query()->create($attributes);

        $author->AddImageFromRequestIfExists($request, 'avatar', 'avatar');

        $author->assignRole(RoleEnum::AUTHOR);

        return $author;
    }
}

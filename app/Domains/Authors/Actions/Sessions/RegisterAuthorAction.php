<?php

namespace Domains\Authors\Actions\Sessions;

use App\Http\Requests\Authors\Sessions\RegisterAuthorRequest;
use App\Models\Admin;
use App\Models\Author;
use Domains\Admins\Notifications\AuthorRegistrationNotification;
use Domains\Authors\DataTransferToObject\Sessions\RegisterAuthorData;
use Domains\Supports\Enums\RoleEnum;
use Domains\Supports\Helpers\SendNotification;

class RegisterAuthorAction
{
    public function __invoke(RegisterAuthorRequest $request): Author
    {
        $attributes = unsetArrayEmptyParam(RegisterAuthorData::fromRequest($request)->toArray());

        $author = Author::query()->create($attributes);

        $author->AddImageFromRequestIfExists($request, 'avatar', 'avatar');

        $author->assignRole(RoleEnum::AUTHOR);

        SendNotification::toAdmins(new AuthorRegistrationNotification($author));

        return $author;
    }
}

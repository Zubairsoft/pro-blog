<?php

namespace Domains\Admins\Actions\Authors;

use App\Http\Requests\Admins\AuthorRequest;
use App\Models\Author;
use Domains\Admins\DataTransferToObject\AuthorData;

final class UpdateAuthorAction
{
    public function __invoke(AuthorRequest $request, string $id): Author
    {
        $attributes = unsetArrayEmptyParam(AuthorData::fromRequest($request)->toArray());

        $author = Author::query()->firstOrFail($id);

        $author->update($attributes);

        return $author;
    }
}

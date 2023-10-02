<?php

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use App\Filament\Resources\Supports\RedirectToThePreviousPage;
use Domains\Supports\Enums\RoleEnum;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateAuthor extends CreateRecord
{
    use RedirectToThePreviousPage;

    protected function handleRecordCreation(array $data): Model
    {
        $author = static::getModel()::query()->create($data);

        $author->assignRole(RoleEnum::AUTHOR);


        return $author;
    }

    protected static string $resource = AuthorResource::class;
}

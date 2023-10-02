<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\Supports\RedirectToThePreviousPage;
use App\Filament\Resources\UserResource;
use Domains\Supports\Enums\RoleEnum;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    use RedirectToThePreviousPage;

    protected function handleRecordCreation(array $data): Model
    {
        $user = static::getModel()::query()->create($data);

        $user->assignRole(RoleEnum::USER);

        return $user;
    }

    protected static string $resource = UserResource::class;
}

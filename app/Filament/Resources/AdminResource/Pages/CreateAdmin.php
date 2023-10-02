<?php

namespace App\Filament\Resources\AdminResource\Pages;

use App\Filament\Resources\AdminResource;
use App\Filament\Resources\Supports\RedirectToThePreviousPage;
use Domains\Supports\Enums\RoleEnum;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateAdmin extends CreateRecord
{
    use RedirectToThePreviousPage;

    protected static string $resource = AdminResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $admin = static::getModel()::query()->create($data);

        $admin->assignRole(RoleEnum::ADMIN);

        return $admin;
    }
}

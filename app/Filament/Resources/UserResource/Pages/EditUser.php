<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\Supports\RedirectToThePreviousPage;
use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditUser extends EditRecord
{
    use RedirectToThePreviousPage;

    protected static string $resource = UserResource::class;

    protected function handleRecordUpdate(Model $user, array $data): Model
    {
        $user->update($data);
       
        return $user;
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return __('messages.update_data');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

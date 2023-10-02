<?php

namespace App\Filament\Resources\AdminResource\Pages;

use App\Filament\Resources\AdminResource;
use App\Filament\Resources\Supports\RedirectToThePreviousPage;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditAdmin extends EditRecord
{
    use RedirectToThePreviousPage;

    protected static string $resource = AdminResource::class;

    protected function handleRecordUpdate(Model $admin, array $data): Model
    {
        $admin->update($data);
        
        return $admin;
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

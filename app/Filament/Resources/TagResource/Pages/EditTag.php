<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\Supports\RedirectToThePreviousPage;
use App\Filament\Resources\TagResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTag extends EditRecord
{
    use RedirectToThePreviousPage;

    protected static string $resource = TagResource::class;

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

<?php

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use App\Filament\Resources\Supports\RedirectToThePreviousPage;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditAuthor extends EditRecord
{
    use RedirectToThePreviousPage;

    protected static string $resource = AuthorResource::class;

    protected function handleRecordUpdate(Model $author, array $data): Model
    {
        $author->update($data);
        
        return $author;
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

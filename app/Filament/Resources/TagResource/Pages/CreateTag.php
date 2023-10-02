<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\Supports\RedirectToThePreviousPage;
use App\Filament\Resources\TagResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    use RedirectToThePreviousPage;
    
    protected static string $resource = TagResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['admin_id'] = auth()->id();
        return $data;
    }

}

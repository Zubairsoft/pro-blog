<?php
namespace App\Filament\Resources\Supports;

trait RedirectToThePreviousPage
{
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
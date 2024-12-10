<?php

namespace App\Filament\Resources\LibrariesResource\Pages;

use App\Filament\Resources\LibrariesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLibraries extends EditRecord
{
    protected static string $resource = LibrariesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

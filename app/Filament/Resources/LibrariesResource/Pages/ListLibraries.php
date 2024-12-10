<?php

namespace App\Filament\Resources\LibrariesResource\Pages;

use App\Filament\Resources\LibrariesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLibraries extends ListRecords
{
    protected static string $resource = LibrariesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

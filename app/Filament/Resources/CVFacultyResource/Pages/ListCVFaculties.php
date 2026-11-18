<?php

namespace App\Filament\Resources\CVFacultyResource\Pages;

use App\Filament\Resources\CVFacultyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCVFaculties extends ListRecords
{
    protected static string $resource = CVFacultyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\CVFacultyResource\Pages;

use App\Filament\Resources\CVFacultyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCVFaculty extends EditRecord
{
    protected static string $resource = CVFacultyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

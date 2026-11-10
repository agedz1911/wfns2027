<?php

namespace App\Filament\Resources\DownloadScheduleResource\Pages;

use App\Filament\Resources\DownloadScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDownloadSchedule extends EditRecord
{
    protected static string $resource = DownloadScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

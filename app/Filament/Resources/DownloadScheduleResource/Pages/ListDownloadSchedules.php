<?php

namespace App\Filament\Resources\DownloadScheduleResource\Pages;

use App\Filament\Resources\DownloadScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDownloadSchedules extends ListRecords
{
    protected static string $resource = DownloadScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

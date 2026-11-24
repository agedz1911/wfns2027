<?php

namespace App\Filament\Clusters\ScientificSchedule\Resources\RoomScheduleResource\Pages;

use App\Filament\Clusters\ScientificSchedule\Resources\RoomScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoomSchedules extends ListRecords
{
    protected static string $resource = RoomScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

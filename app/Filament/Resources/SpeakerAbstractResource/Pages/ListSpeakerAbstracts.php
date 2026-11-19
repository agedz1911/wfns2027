<?php

namespace App\Filament\Resources\SpeakerAbstractResource\Pages;

use App\Filament\Resources\SpeakerAbstractResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpeakerAbstracts extends ListRecords
{
    protected static string $resource = SpeakerAbstractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

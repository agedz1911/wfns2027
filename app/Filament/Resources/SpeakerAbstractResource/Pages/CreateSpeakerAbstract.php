<?php

namespace App\Filament\Resources\SpeakerAbstractResource\Pages;

use App\Filament\Resources\SpeakerAbstractResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpeakerAbstract extends CreateRecord
{
    protected static string $resource = SpeakerAbstractResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return SpeakerAbstractResource::prepareFilesForStorage($data);
    }
}

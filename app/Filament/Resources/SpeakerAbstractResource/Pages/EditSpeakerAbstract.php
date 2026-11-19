<?php

namespace App\Filament\Resources\SpeakerAbstractResource\Pages;

use App\Filament\Resources\SpeakerAbstractResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpeakerAbstract extends EditRecord
{
    protected static string $resource = SpeakerAbstractResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['file_names'] = [];
        $paths = [];

        foreach ($data['files'] ?? [] as $file) {
            $path = is_array($file) ? $file['path'] : $file;
            $paths[] = $path;
            $data['file_names'][$path] = is_array($file) ? $file['name'] : basename($path);
        }

        $data['files'] = $paths;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return SpeakerAbstractResource::prepareFilesForStorage($data);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

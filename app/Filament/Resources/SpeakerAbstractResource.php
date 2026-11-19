<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpeakerAbstractResource\Pages;
use App\Filament\Resources\SpeakerAbstractResource\RelationManagers;
use App\Models\SpeakerAbstract;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\File;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpeakerAbstractResource extends Resource
{
    protected static ?string $model = SpeakerAbstract::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';
    protected static ?string $navigationGroup = 'Abstracts & CV';

    public static function form(Form $form): Form
    {
        $countries = countries();

        return $form
            ->schema([
                Radio::make('title')
                    ->options(function (?SpeakerAbstract $record): array {
                        $options = ['Prof' => 'Prof', 'Dr' => 'Dr', 'Mr' => 'Mr', 'Ms' => 'Ms'];

                        if ($record && ! array_key_exists($record->title, $options)) {
                            $options[$record->title] = $record->title;
                        }

                        return $options;
                    })
                    ->inline()
                    ->required(),
                Forms\Components\TextInput::make('title_other')
                    ->maxLength(255),
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('country')
                    ->options(function (?SpeakerAbstract $record) use ($countries): array {
                        $options = collect($countries)->mapWithKeys(function ($country) {
                            return [$country['name'] => $country['name']];
                        })->all();

                        if ($record && ! array_key_exists($record->country, $options)) {
                            $options[$record->country] = $record->country;
                        }

                        return $options;
                    })
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('institution')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('consent')
                    ->required(),
                Forms\Components\DateTimePicker::make('consented_at'),
                FileUpload::make('files')
                    ->acceptedFileTypes([
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/pdf',
                    ])
                    ->maxSize(5120)
                    ->multiple()
                    ->disk('public')
                    ->reorderable()
                    ->downloadable()
                    ->storeFileNamesIn('file_names')
                    ->directory('SpeakerAbstract'),
                Forms\Components\Hidden::make('file_names'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_other')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\IconColumn::make('consent')
                    ->boolean(),
                Tables\Columns\TextColumn::make('files')
                    ->label('Files')
                    ->state(fn (SpeakerAbstract $record): array => array_map(
                        fn (string | array $file): string => is_array($file) ? $file['name'] : basename($file),
                        $record->files,
                    ))
                    ->listWithLineBreaks()
                    ->wrap(),
                Tables\Columns\TextColumn::make('consented_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function prepareFilesForStorage(array $data): array
    {
        $names = $data['file_names'] ?? [];
        $data['files'] = array_map(fn (string $path): array => [
            'path' => $path,
            'name' => $names[$path] ?? basename($path),
        ], $data['files'] ?? []);
        unset($data['file_names']);

        return $data;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpeakerAbstracts::route('/'),
            'create' => Pages\CreateSpeakerAbstract::route('/create'),
            'edit' => Pages\EditSpeakerAbstract::route('/{record}/edit'),
        ];
    }
}

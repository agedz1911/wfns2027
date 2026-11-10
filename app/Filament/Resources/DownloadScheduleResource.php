<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DownloadScheduleResource\Pages;
use App\Filament\Resources\DownloadScheduleResource\RelationManagers;
use App\Models\DownloadSchedule;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DownloadScheduleResource extends Resource
{
    protected static ?string $model = DownloadSchedule::class;
    protected static ?string $navigationGroup = 'Section';
    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('atglance')
                    ->maxSize(5120)
                    ->downloadable()
                    ->reorderable()
                    ->preserveFilenames()
                    ->directory('DownloadSchedules'),
                FileUpload::make('schedule')
                    ->maxSize(5120)
                    ->downloadable()
                    ->reorderable()
                    ->preserveFilenames()
                    ->directory('DownloadSchedules'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('atglance'),
                Tables\Columns\TextColumn::make('schedule'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDownloadSchedules::route('/'),
            'create' => Pages\CreateDownloadSchedule::route('/create'),
            'edit' => Pages\EditDownloadSchedule::route('/{record}/edit'),
        ];
    }
}

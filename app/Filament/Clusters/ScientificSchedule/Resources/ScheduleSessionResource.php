<?php

namespace App\Filament\Clusters\ScientificSchedule\Resources;

use App\Filament\Clusters\ScientificSchedule;
use App\Filament\Clusters\ScientificSchedule\Resources\ScheduleSessionResource\Pages;
use App\Filament\Clusters\ScientificSchedule\Resources\ScheduleSessionResource\RelationManagers;
use App\Models\ScheduleSession;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleSessionResource extends Resource
{
    protected static ?string $model = ScheduleSession::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $label = 'Category Session';

    protected static ?string $cluster = ScientificSchedule::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_sesi')
                    ->options([
                        'Symposium' => 'Symposium',
                        'Workshop' => 'Workshop',
                        'Master Class' => 'Master Class',
                        'Scientific Competition' => 'Scientific Competition'
                    ])
                    ->native(false),
                TextInput::make('title_ses')
                    ->label('Session Title'),
                DatePicker::make('date')
                    ->native(false),
                TextInput::make('time'),
                Select::make('room')
                    ->options([
                        'Room 1' => 'Room 1',
                        'Room 2' => 'Room 2',
                        'Room 3' => 'Room 3',
                        'Room 4' => 'Room 4',
                        'Room 5' => 'Room 5',
                        'Room 6' => 'Room 6',
                        'Room 7' => 'Room 7',
                        'Room 8' => 'Room 8',   
                        'Room 9' => 'Room 9',
                        'Room 10' => 'Room 10',
                        'Room 11' => 'Room 11',
                        'Room 12' => 'Room 12',
                        'Room 13' => 'Room 13',
                        'Room 14' => 'Room 14',
                        'Room 15' => 'Room 15',
                        'Room 16' => 'Room 16',
                        'Room 17' => 'Room 17',
                        'Room 18' => 'Room 18',
                        'Room 19' => 'Room 19',
                        'Room 20' => 'Room 20',
                    ]),
                TextInput::make('moderator'),
                Textarea::make('panelist'),
                TextInput::make('no_urut')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_urut')
                    ->sortable(),
                TextColumn::make('room')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title_ses')
                    ->searchable()
                    ->label('Session Title'),
                TextColumn::make('date')
                    ->sortable()
                    ->date('d M Y'),
                TextColumn::make('category_sesi')
                    ->sortable()
                    ->label('Category')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ReplicateAction::make(),
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
            'index' => Pages\ListScheduleSessions::route('/'),
            'create' => Pages\CreateScheduleSession::route('/create'),
            'edit' => Pages\EditScheduleSession::route('/{record}/edit'),
        ];
    }
}

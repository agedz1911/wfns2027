<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CVFacultyResource\Pages;
use App\Models\CVFaculty;
use App\Support\CVFacultyForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CVFacultyResource extends Resource
{
    protected static ?string $model = CVFaculty::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Abstracts & CV';

    protected static ?string $navigationLabel = 'CV Faculty';

    public static function form(Form $form): Form
    {
        $countries = countries();
        return $form
            ->schema([
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nip')
                    ->maxLength(255),
                Forms\Components\TextInput::make('profession')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('institution')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('country')
                    ->options(collect($countries)->mapWithKeys(function ($country) {
                        return [$country['name'] => $country['name']];
                    })->all())
                    ->searchable(),
                Forms\Components\TextInput::make('sex')
                    ->required(),
                Forms\Components\TextInput::make('birth_place')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birth_date'),
                Forms\Components\TextInput::make('highest_education')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\Textarea::make('bio')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('photo_path')
                    ->maxSize(3072)
                    ->downloadable()
                    ->reorderable()
                    ->panelLayout('grid')
                    ->image()
                    ->imageEditor()
                    ->directory('cv-faculty-photos'),
                Forms\Components\Toggle::make('consent')
                    ->required(),
                Forms\Components\DateTimePicker::make('consented_at'),
                Forms\Components\Repeater::make('cvTeachings')
                    ->label('Teaching experience')
                    ->relationship()
                    ->orderColumn('sort_order')
                    ->defaultItems(1)
                    ->minItems(1)
                    ->maxItems(CVFacultyForm::MAX_ENTRIES)
                    ->addActionLabel('Add teaching experience')
                    ->schema([
                        Forms\Components\TextInput::make('year')
                            ->required()
                            ->integer()
                            ->rules(['digits:4', 'between:1950,2035']),
                        Forms\Components\TextInput::make('event')
                            ->label('Event or institution')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('country')
                            ->options(collect($countries)->mapWithKeys(function ($country) {
                                return [$country['name'] => $country['name']];
                            })->all())
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('role')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('topic')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('cvWorks')
                    ->label('Work experience related to your lecture topic')
                    ->relationship()
                    ->orderColumn('sort_order')
                    ->defaultItems(1)
                    ->minItems(1)
                    ->maxItems(CVFacultyForm::MAX_ENTRIES)
                    ->addActionLabel('Add work experience')
                    ->schema([
                        Forms\Components\TextInput::make('period')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('position')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('institution')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('country')
                            ->options(collect($countries)->mapWithKeys(function ($country) {
                                return [$country['name'] => $country['name']];
                            })->all())
                            ->searchable()
                            ->required(),
                        Forms\Components\Textarea::make('relevance')
                            ->label('Relevance to your topic')
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo_path')
                    ->label('Photo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('profession')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sex'),
                Tables\Columns\TextColumn::make('birth_place')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('highest_education')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\IconColumn::make('consent')
                    ->boolean(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCVFaculties::route('/'),
            'create' => Pages\CreateCVFaculty::route('/create'),
            'edit' => Pages\EditCVFaculty::route('/{record}/edit'),
        ];
    }
}

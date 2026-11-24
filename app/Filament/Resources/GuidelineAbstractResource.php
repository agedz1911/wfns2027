<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuidelineAbstractResource\Pages;
use App\Filament\Resources\GuidelineAbstractResource\RelationManagers;
use App\Models\GuidelineAbstract;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuidelineAbstractResource extends Resource
{
    protected static ?string $model = GuidelineAbstract::class;
    protected static ?string $navigationGroup = 'Front End Page';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                Select::make('category')
                    ->options([
                        'Free Paper' => 'Free Paper',
                        'Abstract Video' => 'Abstract Video',
                        'Educative Video' => 'Educative Video',
                        'Faq' => 'Faq'
                    ])
                    ->required(),
                MarkdownEditor::make('description'),
                TextInput::make('no_urut')
                    ->numeric()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('category')
                    ->sortable(),
                TextColumn::make('description')
                    ->markdown()
                    ->limit(70),
                TextColumn::make('no_urut')
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
            'index' => Pages\ListGuidelineAbstracts::route('/'),
            'create' => Pages\CreateGuidelineAbstract::route('/create'),
            'edit' => Pages\EditGuidelineAbstract::route('/{record}/edit'),
        ];
    }
}

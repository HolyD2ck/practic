<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriesResource\Pages;
use App\Filament\Resources\CategoriesResource\RelationManagers;
use App\Models\Categories;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoriesResource extends Resource
{
    protected static ?string $model = Categories::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('название')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('описание')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('приоритет')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\DatePicker::make('дата_создания')
                    ->required(),
                Forms\Components\Toggle::make('возрастное_ограничение')
                    ->required(),
                Forms\Components\TextInput::make('пупулярность')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('количество_книг')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('приоритет')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('дата_создания')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('возрастное_ограничение')
                    ->boolean(),
                Tables\Columns\TextColumn::make('пупулярность')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('количество_книг')
                    ->numeric()
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategories::route('/create'),
            'edit' => Pages\EditCategories::route('/{record}/edit'),
        ];
    }
}

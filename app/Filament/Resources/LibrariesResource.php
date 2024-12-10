<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LibrariesResource\Pages;
use App\Filament\Resources\LibrariesResource\RelationManagers;
use App\Models\Libraries;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LibrariesResource extends Resource
{
    protected static ?string $model = Libraries::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('название')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('адрес')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('часы_работы')
                    ->maxLength(50),
                Forms\Components\Toggle::make('открыта')
                    ->required(),
                Forms\Components\TextInput::make('вместимость_книг')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\DatePicker::make('дата_основания'),
                Forms\Components\TextInput::make('рейтинг')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('часы_работы')
                    ->searchable(),
                Tables\Columns\IconColumn::make('открыта')
                    ->boolean(),
                Tables\Columns\TextColumn::make('вместимость_книг')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('дата_основания')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('рейтинг')
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
            'index' => Pages\ListLibraries::route('/'),
            'create' => Pages\CreateLibraries::route('/create'),
            'edit' => Pages\EditLibraries::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BooksResource\Pages;
use App\Filament\Resources\BooksResource\RelationManagers;
use App\Models\Books;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BooksResource extends Resource
{
    protected static ?string $model = Books::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('название')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('автор')
                    ->required()
                    ->maxLength(100),
                Forms\Components\DatePicker::make('дата_публикации')
                    ->required(),
                Forms\Components\TextInput::make('цена')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('страницы')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('доступность')
                    ->required(),
                Forms\Components\TextInput::make('рейтинг')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('добавлено')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('автор')
                    ->searchable(),
                Tables\Columns\TextColumn::make('дата_публикации')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('цена')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('страницы')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('доступность')
                    ->boolean(),
                Tables\Columns\TextColumn::make('рейтинг')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('добавлено')
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBooks::route('/create'),
            'edit' => Pages\EditBooks::route('/{record}/edit'),
        ];
    }
}

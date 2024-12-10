<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublishersResource\Pages;
use App\Filament\Resources\PublishersResource\RelationManagers;
use App\Models\Publishers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PublishersResource extends Resource
{
    protected static ?string $model = Publishers::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('название')
                    ->required()
                    ->maxLength(150),
                Forms\Components\Textarea::make('адрес')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('телефон')
                    ->maxLength(15),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(100),
                Forms\Components\TextInput::make('год_основания'),
                Forms\Components\Toggle::make('активность')
                    ->required(),
                Forms\Components\TextInput::make('сайт')
                    ->maxLength(200),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('телефон')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('год_основания'),
                Tables\Columns\IconColumn::make('активность')
                    ->boolean(),
                Tables\Columns\TextColumn::make('сайт')
                    ->searchable(),
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
            'index' => Pages\ListPublishers::route('/'),
            'create' => Pages\CreatePublishers::route('/create'),
            'edit' => Pages\EditPublishers::route('/{record}/edit'),
        ];
    }
}

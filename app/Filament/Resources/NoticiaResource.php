<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoticiaResource\Pages;
use App\Filament\Resources\NoticiaResource\RelationManagers;
use App\Models\Noticia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NoticiaResource extends Resource
{
    protected static ?string $model = Noticia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\TextInput::make('titulo')
            ->required()
            ->maxLength(100),

        Forms\Components\TextInput::make('resumen')
            ->required()
            ->maxLength(255),

        Forms\Components\DatePicker::make('fecha')
            ->required(),

        Forms\Components\Toggle::make('publicada')
            ->default(true),
    ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('fecha')
                ->date('d/m/Y')
                ->sortable(),

            Tables\Columns\TextColumn::make('titulo')
                ->searchable(),

            Tables\Columns\IconColumn::make('publicada')
                ->boolean(),
        ])
        ->defaultSort('fecha', 'desc')
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListNoticias::route('/'),
            'create' => Pages\CreateNoticia::route('/create'),
            'edit' => Pages\EditNoticia::route('/{record}/edit'),
        ];
    }
}

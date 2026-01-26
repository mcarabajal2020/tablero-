<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MatbaResource\Pages;
use App\Filament\Resources\MatbaResource\RelationManagers;
use App\Models\Matba;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MatbaResource extends Resource
{
    protected static ?string $model = Matba::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('producto_contrato')
            ->label('Producto / Contrato')
            ->required()
            ->maxLength(255),

        Forms\Components\TextInput::make('precio')
            ->numeric()
            ->required(),

        Forms\Components\TextInput::make('precio_compra')
            ->label('Precio Compra')
            ->numeric()
            ->required(),

        Forms\Components\TextInput::make('precio_venta')
            ->label('Precio Venta')
            ->numeric()
            ->required(),
         ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('producto_contrato')
                ->label('Producto / Contrato')
                ->searchable(),

            Tables\Columns\TextColumn::make('precio')
                ->money('ARS'),

            Tables\Columns\TextColumn::make('precio_compra')
                ->label('Compra')
                ->money('ARS'),

            Tables\Columns\TextColumn::make('precio_venta')
                ->label('Venta')
                ->money('ARS'),
        ])
        ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListMatbas::route('/'),
            'create' => Pages\CreateMatba::route('/create'),
            'edit' => Pages\EditMatba::route('/{record}/edit'),
        ];
    }
}

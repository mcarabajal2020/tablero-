<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pizarra;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PizarraResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PizarraResource\RelationManagers;

class PizarraResource extends Resource
{
    protected static ?string $model = Pizarra::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('cereal')
                ->label('Cereal')
                ->required()
                ->maxLength(100),

            TextInput::make('puerto')
                ->label('Puerto')
                ->required()
                ->maxLength(100),

            TextInput::make('precio')
                ->label('Precio')
                ->numeric()
                ->required()
                ->prefix('$'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cereal')
                    ->label('Cereal')
                    ->searchable()
                    ->sortable(),
    
                TextColumn::make('puerto')
                    ->label('Puerto')
                    ->searchable()
                    ->sortable(),
    
                TextColumn::make('precio')
                    ->label('Precio')
                    ->money('ARS')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPizarras::route('/'),
            'create' => Pages\CreatePizarra::route('/create'),
            'edit' => Pages\EditPizarra::route('/{record}/edit'),
        ];
    }
}

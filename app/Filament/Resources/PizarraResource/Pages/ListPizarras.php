<?php

namespace App\Filament\Resources\PizarraResource\Pages;

use App\Filament\Resources\PizarraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPizarras extends ListRecords
{
    protected static string $resource = PizarraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\MatbaResource\Pages;

use App\Filament\Resources\MatbaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMatbas extends ListRecords
{
    protected static string $resource = MatbaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\MatbaResource\Pages;

use App\Filament\Resources\MatbaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMatba extends EditRecord
{
    protected static string $resource = MatbaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

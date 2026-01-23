<?php

namespace App\Filament\Resources\PizarraResource\Pages;

use App\Filament\Resources\PizarraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPizarra extends EditRecord
{
    protected static string $resource = PizarraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

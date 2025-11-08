<?php

namespace App\Filament\Resources\DeterminingControls\Pages;

use App\Filament\Resources\DeterminingControls\DeterminingControlResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDeterminingControl extends ViewRecord
{
    protected static string $resource = DeterminingControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

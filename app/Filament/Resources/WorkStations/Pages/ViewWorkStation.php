<?php

namespace App\Filament\Resources\WorkStations\Pages;

use App\Filament\Resources\WorkStations\WorkStationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWorkStation extends ViewRecord
{
    protected static string $resource = WorkStationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

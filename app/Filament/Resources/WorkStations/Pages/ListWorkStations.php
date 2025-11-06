<?php

namespace App\Filament\Resources\WorkStations\Pages;

use App\Filament\Resources\WorkStations\WorkStationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkStations extends ListRecords
{
    protected static string $resource = WorkStationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

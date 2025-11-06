<?php

namespace App\Filament\Resources\HazardIdentifications\Pages;

use App\Filament\Resources\HazardIdentifications\HazardIdentificationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHazardIdentifications extends ListRecords
{
    protected static string $resource = HazardIdentificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

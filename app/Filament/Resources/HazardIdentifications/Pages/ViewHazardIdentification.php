<?php

namespace App\Filament\Resources\HazardIdentifications\Pages;

use App\Filament\Resources\HazardIdentifications\HazardIdentificationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHazardIdentification extends ViewRecord
{
    protected static string $resource = HazardIdentificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

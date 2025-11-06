<?php

namespace App\Filament\Resources\HazardIdentifications\Pages;

use App\Filament\Resources\HazardIdentifications\HazardIdentificationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHazardIdentification extends EditRecord
{
    protected static string $resource = HazardIdentificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}

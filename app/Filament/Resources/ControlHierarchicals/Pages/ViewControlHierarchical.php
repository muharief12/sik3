<?php

namespace App\Filament\Resources\ControlHierarchicals\Pages;

use App\Filament\Resources\ControlHierarchicals\ControlHierarchicalResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewControlHierarchical extends ViewRecord
{
    protected static string $resource = ControlHierarchicalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

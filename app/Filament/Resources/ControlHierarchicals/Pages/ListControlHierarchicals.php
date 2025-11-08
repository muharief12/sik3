<?php

namespace App\Filament\Resources\ControlHierarchicals\Pages;

use App\Filament\Resources\ControlHierarchicals\ControlHierarchicalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListControlHierarchicals extends ListRecords
{
    protected static string $resource = ControlHierarchicalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

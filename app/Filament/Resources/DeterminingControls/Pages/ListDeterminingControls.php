<?php

namespace App\Filament\Resources\DeterminingControls\Pages;

use App\Filament\Resources\DeterminingControls\DeterminingControlResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDeterminingControls extends ListRecords
{
    protected static string $resource = DeterminingControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

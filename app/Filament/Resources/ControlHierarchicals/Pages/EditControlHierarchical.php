<?php

namespace App\Filament\Resources\ControlHierarchicals\Pages;

use App\Filament\Resources\ControlHierarchicals\ControlHierarchicalResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditControlHierarchical extends EditRecord
{
    protected static string $resource = ControlHierarchicalResource::class;

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

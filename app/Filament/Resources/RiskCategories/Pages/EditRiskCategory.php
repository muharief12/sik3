<?php

namespace App\Filament\Resources\RiskCategories\Pages;

use App\Filament\Resources\RiskCategories\RiskCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRiskCategory extends EditRecord
{
    protected static string $resource = RiskCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

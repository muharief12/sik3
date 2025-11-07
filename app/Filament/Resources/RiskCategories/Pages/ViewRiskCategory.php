<?php

namespace App\Filament\Resources\RiskCategories\Pages;

use App\Filament\Resources\RiskCategories\RiskCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRiskCategory extends ViewRecord
{
    protected static string $resource = RiskCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\RiskCategories\Pages;

use App\Filament\Resources\RiskCategories\RiskCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRiskCategories extends ListRecords
{
    protected static string $resource = RiskCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

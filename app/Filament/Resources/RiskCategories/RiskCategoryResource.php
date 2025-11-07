<?php

namespace App\Filament\Resources\RiskCategories;

use App\Filament\Resources\RiskCategories\Pages\CreateRiskCategory;
use App\Filament\Resources\RiskCategories\Pages\EditRiskCategory;
use App\Filament\Resources\RiskCategories\Pages\ListRiskCategories;
use App\Filament\Resources\RiskCategories\Pages\ViewRiskCategory;
use App\Filament\Resources\RiskCategories\Schemas\RiskCategoryForm;
use App\Filament\Resources\RiskCategories\Schemas\RiskCategoryInfolist;
use App\Filament\Resources\RiskCategories\Tables\RiskCategoriesTable;
use App\Models\RiskCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RiskCategoryResource extends Resource
{
    protected static ?string $model = RiskCategory::class;
    protected static string | UnitEnum | null $navigationGroup = 'Master Data';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return RiskCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RiskCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RiskCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRiskCategories::route('/'),
            'create' => CreateRiskCategory::route('/create'),
            'view' => ViewRiskCategory::route('/{record}'),
            'edit' => EditRiskCategory::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\ControlHierarchicals;

use App\Filament\Resources\ControlHierarchicals\Pages\CreateControlHierarchical;
use App\Filament\Resources\ControlHierarchicals\Pages\EditControlHierarchical;
use App\Filament\Resources\ControlHierarchicals\Pages\ListControlHierarchicals;
use App\Filament\Resources\ControlHierarchicals\Pages\ViewControlHierarchical;
use App\Filament\Resources\ControlHierarchicals\Schemas\ControlHierarchicalForm;
use App\Filament\Resources\ControlHierarchicals\Schemas\ControlHierarchicalInfolist;
use App\Filament\Resources\ControlHierarchicals\Tables\ControlHierarchicalsTable;
use App\Models\ControlHierarchical;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ControlHierarchicalResource extends Resource
{
    protected static ?string $model = ControlHierarchical::class;
    protected static string | UnitEnum | null $navigationGroup = 'Master Data';

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ControlHierarchicalForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ControlHierarchicalInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ControlHierarchicalsTable::configure($table);
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
            'index' => ListControlHierarchicals::route('/'),
            'create' => CreateControlHierarchical::route('/create'),
            'view' => ViewControlHierarchical::route('/{record}'),
            'edit' => EditControlHierarchical::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

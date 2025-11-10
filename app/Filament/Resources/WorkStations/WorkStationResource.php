<?php

namespace App\Filament\Resources\WorkStations;

use App\Filament\Resources\WorkStations\Pages\CreateWorkStation;
use App\Filament\Resources\WorkStations\Pages\EditWorkStation;
use App\Filament\Resources\WorkStations\Pages\ListWorkStations;
use App\Filament\Resources\WorkStations\Pages\ViewWorkStation;
use App\Filament\Resources\WorkStations\RelationManagers\ActivityListsRelationManager;
use App\Filament\Resources\WorkStations\Schemas\WorkStationForm;
use App\Filament\Resources\WorkStations\Schemas\WorkStationInfolist;
use App\Filament\Resources\WorkStations\Tables\WorkStationsTable;
use App\Models\WorkStation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class WorkStationResource extends Resource
{
    protected static ?string $model = WorkStation::class;
    protected static string | UnitEnum | null $navigationGroup = 'Master Data';
    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WorkStationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WorkStationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkStationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ActivityListsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWorkStations::route('/'),
            'create' => CreateWorkStation::route('/create'),
            'view' => ViewWorkStation::route('/{record}'),
            'edit' => EditWorkStation::route('/{record}/edit'),
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

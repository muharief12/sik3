<?php

namespace App\Filament\Resources\HazardIdentifications;

use App\Filament\Resources\HazardIdentifications\Pages\CreateHazardIdentification;
use App\Filament\Resources\HazardIdentifications\Pages\EditHazardIdentification;
use App\Filament\Resources\HazardIdentifications\Pages\ListHazardIdentifications;
use App\Filament\Resources\HazardIdentifications\Pages\ViewHazardIdentification;
use App\Filament\Resources\HazardIdentifications\RelationManagers\RiskActorsRelationManager;
use App\Filament\Resources\HazardIdentifications\Schemas\HazardIdentificationForm;
use App\Filament\Resources\HazardIdentifications\Schemas\HazardIdentificationInfolist;
use App\Filament\Resources\HazardIdentifications\Tables\HazardIdentificationsTable;
use App\Models\HazardIdentification;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HazardIdentificationResource extends Resource
{
    protected static ?string $model = HazardIdentification::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $navigationLabel = 'Hazard Identifications (HI)';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return HazardIdentificationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HazardIdentificationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HazardIdentificationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHazardIdentifications::route('/'),
            'create' => CreateHazardIdentification::route('/create'),
            'view' => ViewHazardIdentification::route('/{record}'),
            'edit' => EditHazardIdentification::route('/{record}/edit'),
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

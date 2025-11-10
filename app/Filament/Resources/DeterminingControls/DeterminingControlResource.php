<?php

namespace App\Filament\Resources\DeterminingControls;

use App\Filament\Resources\DeterminingControls\Pages\CreateDeterminingControl;
use App\Filament\Resources\DeterminingControls\Pages\EditDeterminingControl;
use App\Filament\Resources\DeterminingControls\Pages\ListDeterminingControls;
use App\Filament\Resources\DeterminingControls\Pages\ViewDeterminingControl;
use App\Filament\Resources\DeterminingControls\Schemas\DeterminingControlForm;
use App\Filament\Resources\DeterminingControls\Schemas\DeterminingControlInfolist;
use App\Filament\Resources\DeterminingControls\Tables\DeterminingControlsTable;
use App\Models\DeterminingControl;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeterminingControlResource extends Resource
{
    protected static ?string $model = DeterminingControl::class;
    protected static ?string $navigationLabel = 'Determining Control (DC)';
    protected static ?int $navigationSort = 4;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DeterminingControlForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DeterminingControlInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DeterminingControlsTable::configure($table);
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
            'index' => ListDeterminingControls::route('/'),
            'create' => CreateDeterminingControl::route('/create'),
            'view' => ViewDeterminingControl::route('/{record}'),
            'edit' => EditDeterminingControl::route('/{record}/edit'),
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

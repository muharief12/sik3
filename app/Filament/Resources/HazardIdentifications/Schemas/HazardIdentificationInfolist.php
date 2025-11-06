<?php

namespace App\Filament\Resources\HazardIdentifications\Schemas;

use App\Models\HazardIdentification;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HazardIdentificationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('activityList.activity'),
                TextEntry::make('hazard'),
                TextEntry::make('risk'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn(HazardIdentification $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

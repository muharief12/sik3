<?php

namespace App\Filament\Resources\ControlHierarchicals\Schemas;

use App\Models\ControlHierarchical;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ControlHierarchicalInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (ControlHierarchical $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

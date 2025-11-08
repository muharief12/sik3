<?php

namespace App\Filament\Resources\DeterminingControls\Schemas;

use App\Models\DeterminingControl;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DeterminingControlInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('risk_assessment_id')
                    ->numeric(),
                TextEntry::make('risk_control'),
                TextEntry::make('control_hierarchical_id')
                    ->numeric(),
                TextEntry::make('cost')
                    ->money(),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (DeterminingControl $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

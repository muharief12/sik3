<?php

namespace App\Filament\Resources\RiskAssessments\Schemas;

use App\Models\RiskAssessment;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RiskAssessmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('hazard_identification_id')
                    ->numeric(),
                TextEntry::make('likelihood')
                    ->numeric(),
                TextEntry::make('severity')
                    ->numeric(),
                TextEntry::make('total')
                    ->numeric(),
                TextEntry::make('category'),
                TextEntry::make('status'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (RiskAssessment $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

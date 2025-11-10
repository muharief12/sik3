<?php

namespace App\Filament\Resources\DeterminingControls\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DeterminingControlForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('risk_assessment_id')
                    ->required()
                    ->options(function () {
                        return \App\Models\RiskAssessment::with('hazardIdentification')->get()->pluck('hazardIdentification.risk', 'id');
                    }),
                TextInput::make('risk_control')
                    ->required(),
                Select::make('control_hierarchical_id')
                    ->required()
                    ->relationship('controlHierarchical', 'name'),
                TextInput::make('cost')
                    ->label('Biaya')
                    ->required()
                    ->numeric()
                    ->prefix('RP '),
            ]);
    }
}

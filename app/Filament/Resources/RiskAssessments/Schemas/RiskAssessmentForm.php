<?php

namespace App\Filament\Resources\RiskAssessments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RiskAssessmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('hazard_identification_id')
                    ->required()
                    ->numeric(),
                TextInput::make('likelihood')
                    ->required()
                    ->numeric(),
                TextInput::make('severity')
                    ->required()
                    ->numeric(),
                TextInput::make('total')
                    ->required()
                    ->numeric(),
                TextInput::make('category')
                    ->required(),
                TextInput::make('status')
                    ->required(),
            ]);
    }
}

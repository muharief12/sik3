<?php

namespace App\Filament\Resources\DeterminingControls\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DeterminingControlForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('risk_assessment_id')
                    ->required()
                    ->numeric(),
                TextInput::make('risk_control')
                    ->required(),
                TextInput::make('control_hierarchical_id')
                    ->required()
                    ->numeric(),
                TextInput::make('cost')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
            ]);
    }
}

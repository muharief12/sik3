<?php

namespace App\Filament\Resources\HazardIdentifications\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HazardIdentificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('activity_list_id')
                    ->required()
                    ->relationship('activityList', 'activity')
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->activity} | {$record->facility}")
                    ->columnSpanFull()
                    ->searchable()
                    ->preload(),
                TextInput::make('hazard')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('risk')
                    ->required()
                    ->columnSpanFull(),
                Repeater::make('riskActors')
                    ->relationship('riskActors')
                    ->label('Risk Actors')
                    ->columns(1)
                    ->schema([
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->preload()
                            ->searchable()
                            ->required(),
                    ])->minItems(1)
                    ->columnSpanFull(),
            ]);
    }
}

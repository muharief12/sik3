<?php

namespace App\Filament\Resources\WorkStations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WorkStationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}

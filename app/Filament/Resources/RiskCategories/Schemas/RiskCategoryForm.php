<?php

namespace App\Filament\Resources\RiskCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RiskCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('likelihood')
                    ->required()
                    ->numeric(),
                TextInput::make('severity')
                    ->required()
                    ->numeric(),
                TextInput::make('category')
                    ->required(),
            ]);
    }
}

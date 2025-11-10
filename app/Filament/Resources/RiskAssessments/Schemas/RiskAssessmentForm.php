<?php

namespace App\Filament\Resources\RiskAssessments\Schemas;

use App\Models\RiskCategory;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class RiskAssessmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('hazard_identification_id')
                    ->relationship('hazardIdentification', 'risk')
                    ->required()
                    ->columnSpanFull(),
                Select::make('likelihood')
                    ->options(array_combine(range(1, 5), ['Sangat Kecil (1)', 'Kecil (2)', 'Sedang (3)', 'Besar (4)', 'Sangat Besar (5)']))
                    ->reactive()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $likelihood = $get('likelihood') ?? 0;
                        $severity = $get('severity') ?? 0;
                        $category = RiskCategory::where('likelihood', $likelihood)->where('severity', $severity)->first()->category ?? '-';
                        $set('total', $likelihood * $severity ?? 0);
                        $set('category', $category);
                    })
                    ->required(),
                Select::make('severity')
                    ->options(array_combine(range(1, 5), ['Tidak Signifikan (1)', 'Minor (2)', 'Medium (3)', 'Signifikan (4)', 'Kritis (5)']))
                    ->reactive()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $likelihood = $get('likelihood') ?? 0;
                        $severity = $get('severity') ?? 0;
                        $category = RiskCategory::where('likelihood', $likelihood)->where('severity', $severity)->first()->category ?? '-';
                        $set('total', $likelihood * $severity ?? 0);
                        $set('category', $category);
                    })
                    ->required(),
                Select::make('status')
                    ->options([
                        'estimate' => 'Estimasi',
                        'monitor' => 'Monitor'
                    ])
                    ->default('estimate')
                    ->required(),
                TextInput::make('total')
                    ->required()
                    ->readOnly()
                    ->afterStateHydrated(function (Get $get, Set $set) {
                        $likelihood = $get('likelihood') ?? 0;
                        $severity = $get('severity') ?? 0;
                        $set('total', $likelihood * $severity ?? 0);
                    })
                    ->numeric(),
                TextInput::make('category')
                    ->live()
                    ->readOnly()
                    ->required(),
            ]);
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\RiskAssessment;
use Filament\Widgets\ChartWidget;

class RiskCategoryChart extends ChartWidget
{
    protected ?string $heading = 'Distribusi Kategori Risiko';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $lowCategoryCount = RiskAssessment::where('category', 'Rendah')->count();
        $moderateCategoryCount = RiskAssessment::where('category', 'Moderat')->count();
        $highCategoryCount = RiskAssessment::where('category', 'Tinggi')->count();
        $extremeCategoryCount = RiskAssessment::where('category', 'Ekstrem')->count();
        return [
            'dataset' => [
                [
                    'label' => 'Kategori Risiko',
                    'data' => [
                        $lowCategoryCount,
                        $moderateCategoryCount,
                        $highCategoryCount,
                        $extremeCategoryCount,
                    ],
                    'backgroundColor' => [
                        '#34D399', // Green for Low
                        '#FBBF24', // Yellow for Moderate
                        '#F87171', // Red for High
                        '#B91C1C', // Dark Red for Extreme
                    ],
                    'hoverOffset' => 8,
                ],
            ],
            'labels' => ['Rendah', 'Moderat', 'Tinggi', 'Ekstrem'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}

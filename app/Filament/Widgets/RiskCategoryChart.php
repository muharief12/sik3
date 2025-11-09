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
            'datasets' => [
                [
                    'label' => 'Kategori Risiko',
                    'data' => [
                        $lowCategoryCount,
                        $moderateCategoryCount,
                        $highCategoryCount,
                        $extremeCategoryCount,
                    ],
                    'backgroundColor' => [
                        '#34D399', // Green for Rendah
                        '#3B82F6', // Blue for Moderat
                        '#FBBF24', // Yellow for Tinggi
                        '#B91C1C', // Dark Red for Ekstrem
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

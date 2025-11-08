<?php

namespace App\Filament\Widgets;

use App\Models\DeterminingControl;
use Filament\Widgets\ChartWidget;

class DeterminingControlChart extends ChartWidget
{
    protected ?string $heading = 'Distribusi Pengendalian Risiko';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $eliminasi = DeterminingControl::whereHas('controlHierarchical', function ($query) {
            $query->where('name', 'Eliminasi');
        })->count();
        $subtitusi = DeterminingControl::whereHas('controlHierarchical', function ($query) {
            $query->where('name', 'Substitusi');
        })->count();
        $engineering = DeterminingControl::whereHas('controlHierarchical', function ($query) {
            $query->where('name', 'Engineering');
        })->count();
        $administrasi = DeterminingControl::whereHas('controlHierarchical', function ($query) {
            $query->where('name', 'Administrasi');
        })->count();
        $apd = DeterminingControl::whereHas('controlHierarchical', function ($query) {
            $query->where('name', 'APD');
        })->count();
        return [
            'dataset' => [
                [
                    'label' => 'Determining Control',
                    'data' => [
                        $eliminasi,
                        $subtitusi,
                        $engineering,
                        $administrasi,
                        $apd,
                    ],
                    'backgroundColor' => [
                        '#EF4444', // Red for Eliminasi
                        '#F59E0B', // Yellow for Substitusi
                        '#3B82F6', // Blue for Engineering
                        '#10B981', // Green for Administrasi
                        '#8B5CF6', // Purple for APD
                    ],
                    'hoverOffset' => 8,
                ],
            ],
            'labels' => ['Eliminasi', 'Substitusi', 'Engineering', 'Administrasi', 'APD'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

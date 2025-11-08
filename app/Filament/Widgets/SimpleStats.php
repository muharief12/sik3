<?php

namespace App\Filament\Widgets;

use App\Models\ActivityList;
use App\Models\DeterminingControl;
use App\Models\HazardIdentification;
use App\Models\RiskAssessment;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SimpleStats extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalRisk =  HazardIdentification::count();
        $costEstimation = DeterminingControl::sum('cost');
        $activities = ActivityList::count();
        return [
            Stat::make('Total Risiko', $totalRisk)->color('danger'),
            Stat::make('Estimasi Biaya', 'Rp ' . number_format($costEstimation, '0', ',', '.'))->color('blue'),
            Stat::make('Total Aktivitas', $activities)->color('warning'),
        ];
    }
}

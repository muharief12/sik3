<?php

namespace App\Filament\Widgets;

use App\Models\ActivityList;
use App\Models\DeterminingControl;
use App\Models\HazardIdentification;
use App\Models\RiskActor;
use App\Models\RiskAssessment;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class SimpleStats extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        if (Auth::user()->hasRole('Staff')) {
            $totalRisk =  HazardIdentification::whereHas('riskActors', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->count();
            $costEstimation = DeterminingControl::whereHas('riskAssessment.hazardidentification.riskActors', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->sum('cost');
            $activities = ActivityList::whereHas('hazardidentifications.riskActors', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->count();
            $actor = RiskActor::with('hazardidentification.activityList.workStation')
                ->where('user_id', Auth::id())
                ->first();

            return [
                Stat::make(
                    'Total Risiko' . (Auth::user()->hasRole('Staff') ?
                        ' (WS-' . ($actor?->hazardidentification?->activityList?->first()?->workStation?->name ?? '') . ")" : ''),
                    $totalRisk
                )->color('danger'),
                Stat::make(
                    'Estimasi Biaya' . (Auth::user()->hasRole('Staff') ?
                        ' (WS-' . ($actor?->hazardidentification?->activityList?->first()?->workStation?->name ?? '') . ")" : ''),
                    'Rp ' . number_format($costEstimation, '0', ',', '.')
                )->color('blue'),
            ];
        } else {
            $totalRisk =  HazardIdentification::count();
            $costEstimation = DeterminingControl::sum('cost');
            $activities = ActivityList::count();

            return [
                Stat::make(
                    'Total Risiko' . (Auth::user()->hasRole('Staff') ?
                        ' (WS-' . ($actor?->hazardidentification?->activityList?->first()?->workStation?->name ?? '') . ")" : ''),
                    $totalRisk
                )->color('danger'),
                Stat::make(
                    'Estimasi Biaya' . (Auth::user()->hasRole('Staff') ?
                        ' (WS-' . ($actor?->hazardidentification?->activityList?->first()?->workStation?->name ?? '') . ")" : ''),
                    'Rp ' . number_format($costEstimation, '0', ',', '.')
                )->color('blue'),
                Stat::make(
                    'Total Aktivitas' . (Auth::user()->hasRole('Staff') ?
                        ' (WS-' . ($actor?->hazardidentification?->activityList?->first()?->workStation?->name ?? '') . ")" : ''),
                    $activities
                )->color('warning'),
            ];
        }
    }

    protected function getColumns(): int
    {
        return count($this->getStats());
    }
}

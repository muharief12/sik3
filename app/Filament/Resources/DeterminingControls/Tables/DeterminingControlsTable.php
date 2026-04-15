<?php

namespace App\Filament\Resources\DeterminingControls\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class DeterminingControlsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                if (Auth::user()?->hasRole('Staff')) {
                    $query->whereHas('riskAssessment.hazardIdentification.riskActors', function ($q) {
                        $q->where('user_id', Auth::id());
                    });
                }
            })
            ->columns([
                TextColumn::make('riskAssessment.hazardIdentification.risk')
                    ->label('Risiko')
                    ->wrap()
                    ->sortable(),
                TextColumn::make('riskAssessment.category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Rendah' => 'success',
                        'Moderat' => 'info',
                        'Tinggi' => 'warning',
                        'Ekstrem' => 'danger',
                    })
                    ->sortable(),
                TextColumn::make('risk_control')
                    ->label('Pengendalian Risiko')
                    ->wrap()
                    ->searchable(),
                TextColumn::make('controlHierarchical.name')
                    ->label('Strategi Pengendalian Risiko')
                    ->sortable(),
                TextColumn::make('cost')
                    ->prefix('Rp ')
                    ->sortable(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}

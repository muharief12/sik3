<?php

namespace App\Filament\Resources\RiskAssessments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class RiskAssessmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hazardIdentification.risk')
                    ->wrap()
                    ->label('Risiko')
                    ->sortable(),
                TextColumn::make('likelihood')
                    ->label('Kemungkinan')
                    ->formatStateUsing(function ($state) {
                        $labels = [
                            1 => 'Sangat Kecil (1)',
                            2 => 'Kecil (2)',
                            3 => 'Sedang (3)',
                            4 => 'Besar (4)',
                            5 => 'Sangat Besar (5)',
                        ];

                        return $labels[$state] ?? '-';
                    })
                    ->sortable(),
                TextColumn::make('severity')
                    ->label('Dampak')
                    ->formatStateUsing(function ($state) {
                        $labels = [
                            1 => 'Tidak Signifikan (1)',
                            2 => 'Minor (2)',
                            3 => 'Medium (3)',
                            4 => 'Signifikan (4)',
                            5 => 'Kritis (5)',
                        ];

                        return $labels[$state] ?? '-';
                    })
                    ->sortable(),
                TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Rendah' => 'success',
                        'Moderat' => 'info',
                        'Tinggi' => 'warning',
                        'Ekstrem' => 'danger',
                    })
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable(),
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

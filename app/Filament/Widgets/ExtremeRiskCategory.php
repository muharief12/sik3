<?php

namespace App\Filament\Widgets;

use App\Models\RiskAssessment;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ExtremeRiskCategory extends TableWidget
{
    protected static ?string $heading = 'Daftar Risiko Kategori Ekstrem';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => RiskAssessment::query()
                ->where('category', 'Ekstrem')->latest())
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('hazardIdentification.risk')
                    ->label('Nama Risiko')
                    ->searchable()
                    ->wrap(),

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

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Rendah' => 'success',
                        'Moderat' => 'info',
                        'Tinggi' => 'warning',
                        'Ekstrem' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->striped()
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}

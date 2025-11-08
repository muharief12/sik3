<?php

namespace App\Filament\Widgets;

use App\Models\RiskAssessment;
use Filament\Actions\BulkActionGroup;
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
                    ->limit(40),

                TextColumn::make('likelihood')
                    ->label('Kemungkinan')
                    ->sortable(),

                TextColumn::make('severity')
                    ->label('Dampak')
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
                //
            ])
            ->striped()
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\HazardIdentification;
use App\Models\RiskAssessment;
use App\Models\RiskCategory;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ExtremeRiskCategory extends TableWidget
{
    protected static ?string $heading = 'Daftar Risiko Kategori Ekstrem';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => RiskAssessment::query()
                ->where('category', 'Ekstrem')->whereHas('hazardidentification.riskActors', function ($q) {
                    $q->where('user_id', Auth::user()->id);
                })->latest())
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
                Action::make('updateRiskAssessment')
                    ->icon('heroicon-o-exclamation-triangle')
                    ->modalHeading('Form Risk Assessment')
                    ->modalWidth('5xl')
                    ->mountUsing(function ($form) {
                        $hazards = HazardIdentification::query()
                            ->with(['riskActors' => function ($q) {
                                $q->where('user_id', Auth::user()->id);
                            }, 'latestRiskAssessment'])
                            ->whereHas('riskActors', function ($q) {
                                $q->where('user_id', Auth::user()->id);
                            })
                            // ->where('status', 'accident') // opsional
                            ->get();

                        $data = [];

                        foreach ($hazards as $hazard) {
                            foreach ($hazard->riskActors as $actor) {
                                $data[] = [
                                    'hazard_identification_id' => $hazard->id,
                                    'hazard' => $hazard->hazard,
                                    'risk' => $hazard->risk,
                                    'actor_name' => $actor->user->name,
                                    'likelihood' => $hazard->latestRiskAssessment->likelihood ?? null,
                                    'severity' => $hazard->latestRiskAssessment->severity ?? null,
                                    // 'category' => RiskCategory::where('likelihood', $data['likelihood'])->where('severity', $data['severity'])->category,
                                    'status' => 'monitor'
                                ];
                            }
                        }

                        $form->fill([
                            'assessments' => $data
                        ]);
                    })
                    ->form([
                        $calculateRisk = function (Get $get, Set $set) {

                            $likelihood = $get('likelihood');
                            $severity = $get('severity');

                            if ($likelihood && $severity) {

                                $total = $likelihood * $severity;

                                $category = \App\Models\RiskCategory::query()
                                    ->where('likelihood', $likelihood)
                                    ->where('severity', $severity)
                                    ->value('category') ?? '-';

                                $set('total', $total);
                                $set('category', $category);
                            } else {
                                $set('total', 0);
                                $set('category', '-');
                            }
                        },
                        Repeater::make('assessments')
                            ->label('Risk Assessment List')
                            ->schema([
                                Hidden::make('hazard_identification_id'),
                                Grid::make()
                                    ->schema([
                                        Placeholder::make('hazard')
                                            ->wrap()
                                            ->disabled(),
                                        Placeholder::make('risk')
                                            ->disabled(),
                                        TextInput::make('actor_name')
                                            ->disabled(),
                                    ])
                                    ->columns(3)
                                    ->columnSpanFull(),
                                Grid::make()
                                    ->schema([
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
                                            ->afterStateHydrated($calculateRisk)
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
                                            ->afterStateHydrated($calculateRisk)
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
                                    ])
                                    ->columns(3)
                                    ->columnSpanFull(),
                                Select::make('status')
                                    ->options([
                                        'estimate' => 'Estimasi',
                                        'monitor' => 'Monitor'
                                    ])
                                    ->required(),
                                TextInput::make('category')
                                    ->live()
                                    ->dehydrated()
                                    ->readOnly()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->disableItemCreation()
                            ->disableItemDeletion()
                    ])
                    ->action(function (array $data) {
                        foreach ($data['assessments'] as $item) {
                            $existing = RiskAssessment::where('hazard_identification_id', $item['hazard_identification_id'])
                                ->whereDate('created_at', today())
                                ->first();

                            if ($existing) {
                                $existing->update([
                                    'likelihood' => $item['likelihood'],
                                    'severity' => $item['severity'],
                                    'total' => $item['total'],
                                    'category' => $item['category'],
                                    'status' => $item['status'],
                                ]);
                            } else {
                                RiskAssessment::create([
                                    'hazard_identification_id' => $item['hazard_identification_id'],
                                    'likelihood' => $item['likelihood'],
                                    'severity' => $item['severity'],
                                    'total' => $item['total'],
                                    'category' => $item['category'],
                                    'status' => $item['status'],
                                ]);
                            };
                        }
                        Notification::make()
                            ->title('Risk Assessment berhasil disimpan')
                            ->success()
                            ->send();
                    })
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

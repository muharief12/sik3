<?php

namespace App\Filament\Widgets;

use App\Models\HazardIdentification;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function Symfony\Component\Clock\now;

class AccidentalTable extends TableWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Data Pengajuan Insiden Baru';
    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => HazardIdentification::query()
                ->where('status', 'accident')->whereHas('riskActors', function ($q) {
                    $q->where('user_id', Auth::user()->id);
                }))
            ->defaultPaginationPageOption(5)
            ->columns([
                TextColumn::make('hazard')
                    ->label('Bahaya')
                    ->wrap()
                    ->searchable(),
                TextColumn::make('risk')
                    ->label('Risiko')
                    ->wrap()
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Risiko')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'accident' => 'danger',
                        'validated' => 'warning',
                    })
                    ->searchable(),
                TextColumn::make('riskActors.user.name')
                    ->label('Aktor Risiko')
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
                //
            ])
            ->headerActions([
                Action::make('accidentData')
                    ->label('Data Insiden Baru')
                    ->modalHeading('Form data insiden baru')
                    ->color('primary')
                    ->form([
                        Select::make('activity_list_id')
                            ->required()
                            ->relationship('activityList', 'activity')
                            ->getOptionLabelFromRecordUsing(fn($record) => "{$record->activity} | {$record->facility}")
                            ->columnSpanFull()
                            ->searchable()
                            ->preload(),
                        TextInput::make('hazard')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('risk')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('note')
                            ->default('Berbahaya dan mengganggu k3 sehingga berdampak pada operasional produksi terganggu')
                            ->columnSpanFull(),
                        FileUpload::make('evidence')
                            ->disk('public')
                            ->directory('hi/evidence')
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->extraInputAttributes([
                                'accept' => 'image/*',
                                'capture' => 'environment'
                            ])
                            ->getUploadedFileNameForStorageUsing(function ($file) {
                                return Str::uuid() . $file->getClientOriginalExtension();
                            })
                            ->columnSpanFull(),
                        Hidden::make('status')
                            ->default('accident')
                            ->columnSpanFull(),
                    ])
                    ->action(function (array $data) {
                        DB::transaction(function () use ($data) {
                            $newAccidentData = HazardIdentification::create($data);
                            $newAccidentData->riskActors()->createMany([
                                [
                                    'user_id' => Auth::user()->id,
                                ],
                                [
                                    'user_id' => User::role('Manager')->first()->id,
                                ]
                            ]);
                        });
                    })
                    ->successNotificationTitle('Data insiden baru berhasil dibuat. Silakan menunggu konfirmasi dari koordinator K3.')
                    ->failureNotificationTitle('Maaf, Data pengajuan indiden Anda gagal'),
            ])
            ->recordActions([
                ViewAction::make()
                    ->modalHeading('Lihat Detail Data Pengajuan Insiden Baru (Hazard Identification)')
                    ->modalAlignment('start') // ⬅️ ini kuncinya
                    ->modalAutofocus(false)
                    ->infolist([
                        Section::make('Informasi Insiden')
                            ->schema([
                                TextEntry::make('activityList.activity')
                                    ->label('Aktivitas'),

                                TextEntry::make('activityList.facility')
                                    ->label('Fasilitas'),

                                TextEntry::make('hazard')
                                    ->label('Hazard'),

                                TextEntry::make('risk')
                                    ->label('Risk'),

                                TextEntry::make('note')
                                    ->label('Catatan'),
                                TextEntry::make('status')
                                    ->badge()
                                    ->color(fn($state) => match ($state) {
                                        'accident' => 'danger',
                                        'validated' => 'success',
                                        default => 'gray',
                                    }),
                                TextEntry::make('created_at')
                                    ->label('Tanggal Dibuat')
                                    ->dateTime(),
                                TextEntry::make('updated_at')
                                    ->label('Terakhir Update')
                                    ->dateTime(),

                            ])
                            ->columns(2),

                        Section::make('Bukti Insiden')
                            ->schema([
                                ImageEntry::make('evidence')
                                    ->disk('public')
                                    ->height(200)
                                    ->columnSpanFull(),

                            ]),

                        // Section::make('Status & Metadata')
                        //     ->schema([

                        //         TextEntry::make('status')
                        //             ->badge()
                        //             ->color(fn($state) => match ($state) {
                        //                 'accident' => 'danger',
                        //                 'validated' => 'success',
                        //                 default => 'gray',
                        //             }),

                        //         TextEntry::make('created_at')
                        //             ->label('Tanggal Dibuat')
                        //             ->dateTime(),

                        //         TextEntry::make('updated_at')
                        //             ->label('Terakhir Update')
                        //             ->dateTime(),
                        //     ])
                        //     ->columns(2),
                    ]),
                Action::make('validated')
                    ->label('Validasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function ($record) {

                        $record->update([
                            'status' => 'validated',
                        ]);
                    })
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}

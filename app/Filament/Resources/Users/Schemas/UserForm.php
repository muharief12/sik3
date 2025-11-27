<?php

namespace App\Filament\Resources\Users\Schemas;

use Carbon\Carbon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

use function Symfony\Component\Clock\now;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at')->default(\Carbon\Carbon::now()),
                TextInput::make('password')
                    ->password()
                    ->default('password')
                    ->required(),
                FileUpload::make('avatar')
                    ->disk('public')
                    ->directory('avatars')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
                TextInput::make('phone_number')
                    ->tel()
                    ->default(null),
            ]);
    }
}

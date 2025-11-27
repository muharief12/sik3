<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                ImageEntry::make('avatar')
                    ->placeholder('-'),
                TextEntry::make('phone_number')
                    ->placeholder('-'),
                TextEntry::make('roles.name')
                    ->label('Roles')
                    // ->formatStateUsing(fn($state) => $state->pluck('name')->join(', '))
                    ->badge()
                    ->separator(' ')
                    ->color(fn(string $state): string => match ($state) {
                        'Manager' => 'success',
                        'super_admin' => 'info',
                        'Staff' => 'warning',
                        default => 'gray',
                    })
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

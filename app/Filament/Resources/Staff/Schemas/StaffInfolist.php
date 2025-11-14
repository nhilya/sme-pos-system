<?php

namespace App\Filament\Resources\Staff\Schemas;

use App\Models\Staff;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StaffInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('role.name')
                    ->label('Role'),
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('identificationType.name')
                    ->label('Identification type'),
                TextEntry::make('identification_no'),
                TextEntry::make('phone_no')
                    ->placeholder('-'),
                TextEntry::make('phone_country_code_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('date_joined')
                    ->date(),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('address')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Staff $record): bool => $record->trashed()),
            ]);
    }
}

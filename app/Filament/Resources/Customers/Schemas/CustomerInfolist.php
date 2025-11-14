<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CustomerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email')
                    ->placeholder('N/A'),
                TextEntry::make('phoneCountryCode.phone_code')
                    ->label('Phone Country Code'),
                TextEntry::make('phone_no'),
                TextEntry::make('date_of_birth')
                    ->label('DOB')
                    ->date(),
                TextEntry::make('address')
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

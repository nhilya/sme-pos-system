<?php

namespace App\Filament\Resources\Staff\Schemas;

use App\Models\Country;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StaffForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('role_id')
                    ->relationship('role', 'display_name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email(),
                Select::make('identification_type_id')
                    ->relationship('identificationType', 'display_name')
                    ->label('Identification Type')
                    ->required(),
                TextInput::make('identification_no')
                    ->label('Identification No')
                    ->required(),
                TextInput::make('phone_no')
                    ->label('Phone No')
                    ->tel()
                    ->numeric()
                    ->required(),
                Select::make('phone_country_code_id')
                    ->label('Country Code')
                    ->options(Country::all()->mapWithKeys(fn ($country) => [
                        $country->id => "{$country->phone_code} - {$country->name}",
                    ])),
                DatePicker::make('date_joined')
                    ->label('Date Joined')
                    ->required(),
                DatePicker::make('date_of_birth')
                    ->label('DOB')
                    ->required(),
                TextInput::make('address'),
            ]);
    }
}

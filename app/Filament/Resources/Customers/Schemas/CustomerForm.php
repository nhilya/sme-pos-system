<?php

namespace App\Filament\Resources\Customers\Schemas;

use App\Models\Country;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Full Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email(),
                Select::make('phone_country_code_id')
                    ->label('Country Code')
                    ->required()
                    ->options(Country::all()->mapWithKeys(fn ($country) => [
                        $country->id => "{$country->phone_code} - {$country->name}",
                    ])),
                TextInput::make('phone_no')
                    ->label('Phone Number')
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->required(),
                DatePicker::make('date_of_birth')
                    ->label('DOB')
                    ->required(),
                TextInput::make('address')
                    ->label('Address')
                    ->required(),
            ]);
    }
}

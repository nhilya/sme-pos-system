<?php

namespace App\Filament\Resources\ItemCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ItemCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Category Name')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $set('slug', Str::slug((string) $state, '_'));
                    }),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->default(fn (callable $get) => Str::slug((string) $get('name'), '_')),
                TextInput::make('description')
                    ->required(),
            ]);
    }
}

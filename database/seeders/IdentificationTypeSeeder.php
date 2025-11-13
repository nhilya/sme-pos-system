<?php

namespace Database\Seeders;

use App\Models\IdentificationType;
use Illuminate\Database\Seeder;

class IdentificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function identificationTypes(): array
    {
        return [
            [
                'name' => 'nric',
                'display_name' => 'NRIC',
            ],
            [
                'name' => 'passport',
                'display_name' => 'Passport',
            ],
        ];
    }

    /**
     * Run the database seeds.
     */
    public static function runUp(): void
    {
        foreach (self::identificationTypes() as $idType) {
            IdentificationType::create($idType);
        }
    }

    public static function runDown(): void
    {
        foreach (self::identificationTypes() as $idType) {
            IdentificationType::where('name', $idType['name'])->delete();
        }
    }
}

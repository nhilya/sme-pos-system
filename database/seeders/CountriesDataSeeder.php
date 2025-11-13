<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CountriesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function runUp(): void
    {
        $path = base_path('database/migrations/patch-resources/countries_data_patch.csv');

        if (! file_exists($path)) {
            Log::info("Countries data patch file not found at: $path");

            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file);

        $rows = [];
        $now = now();

        while (($row = fgetcsv($file)) !== false) {
            $data = array_combine($headers, $row);

            // Convert empty string values to null
            $data = array_map(fn ($value) => $value === '' ? null : $value, $data);

            $rows[] = [
                'name' => $data['country_name'],
                'currency_code' => $data['currency_code'],
                'phone_code' => $data['phone_code'],
                'nationality' => $data['nationality'],
                'nationality_code' => $data['nationality_code'],
            ];
        }

        if (! empty($rows)) {
            Country::insert($rows);
        }

        fclose($file);
    }

    public static function runDown(): void
    {
        $path = base_path('database/migrations/patch-resources/countries_data_patch.csv');

        if (! file_exists($path)) {
            Log::info("Countries data patch file not found at: $path");

            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            $data = array_combine($headers, $row);

            Country::where('nationality_code', $data['nationality_code'])->delete();
        }

        fclose($file);
    }
}

<?php

use Database\Seeders\CountriesDataSeeder;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        CountriesDataSeeder::runUp();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        CountriesDataSeeder::runDown();
    }
};

<?php

use Database\Seeders\IdentificationTypeSeeder;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        IdentificationTypeSeeder::runUp();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        IdentificationTypeSeeder::runDown();
    }
};

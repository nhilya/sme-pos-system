<?php

use Database\Seeders\StaffRolesSeeder;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        StaffRolesSeeder::runUp();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        StaffRolesSeeder::runDown();
    }
};

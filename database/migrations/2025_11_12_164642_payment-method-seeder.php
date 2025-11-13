<?php

use Database\Seeders\PaymentMethodSeeder;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        PaymentMethodSeeder::runUp();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        PaymentMethodSeeder::runDown();
    }
};

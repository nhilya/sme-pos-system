<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentMethodSeeder extends Seeder
{
    private static function paymentMethods(): array
    {
        return [
            [
                'name' => 'Cash',
                'description' => 'Payment made with physical currency.',
            ],
            [
                'name' => 'E-Wallet',
                'description' => 'Payment made through electronic wallet services.',
            ],
            [
                'name' => 'Bank Transfer',
                'description' => 'Payment made via bank transfer services.',
            ],
            [
                'name' => 'QR',
                'description' => 'Payment made using QR code scanning.',
            ],
            [
                'name' => 'Delivery Platform',
                'description' => 'Payment processed through a delivery platform.',
            ],
        ];
    }

    /**
     * Run the database seeds.
     */
    public static function runUp(): void
    {
        foreach (self::paymentMethods() as $method) {
            PaymentMethod::create([
                'name' => $method['name'],
                'slug' => Str::slug($method['name'], '_'),
                'description' => $method['description'] ?? null,
            ]);
        }
    }

    public static function runDown(): void
    {
        foreach (self::paymentMethods() as $method) {
            PaymentMethod::where('name', $method['name'])->delete();
        }
    }
}

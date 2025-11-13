<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $guarded = [
        'id',
    ];

    public const CASH = 1;

    public const E_WALLET = 2;

    public const BANK_TRANSFER = 3;

    public const QR = 4;

    public const DELIVERY_PLATFORM = 5;
}

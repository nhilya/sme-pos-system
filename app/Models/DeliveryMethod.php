<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    protected $guarded = [
        'id',
    ];

    public const SHOPEEFOOD = 1;

    public const GRABFOOD = 2;

    public const FOODPANDA = 3;

    public const SELF_PICKUP = 4;

    public const DINE_IN = 5;

    public const TAKEAWAY = 6;
}

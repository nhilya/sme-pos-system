<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function phoneCountryCode(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'phone_country_code_id');
    }
}

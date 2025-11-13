<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentificationType extends Model
{
    protected $guarded = [
        'id',
    ];

    public const NRIC = 1;

    public const PASSPORT = 2;
}

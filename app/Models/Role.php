<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [
        'id',
    ];

    public const SUPER_ADMIN = 1;

    public const ADMIN = 2;

    public const STAFF = 3;

    public const MANAGER = 4;
}

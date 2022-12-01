<?php

namespace App\Models;

use Snowflake\Snowflakes;
use Snowflake\SnowflakeCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    use Snowflakes;
    use SnowflakeCast;

    protected $fillable = [
        'name',
        'company_code',
        'status',
        'email',
        'phone',
        'street',
        'city',
        'post_code',
        'country',

    ];

    protected $casts = [
        'id' => SnowflakeCast::class,
    ];
}

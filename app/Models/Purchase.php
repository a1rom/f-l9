<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Supplier;
use Snowflake\Snowflakes;
use Snowflake\SnowflakeCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;
    use Snowflakes;
    use SnowflakeCast;

    protected $fillable = [
        'date',
        'supplier_id',
        'user_id',
        'vat_id',
        'total_vat',
    ];

    protected $casts = [
        'id' => SnowflakeCast::class,
        'supplier_id' => SnowflakeCast::class,
        'user_id' => SnowflakeCast::class,
        'vat_id' => SnowflakeCast::class,
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}

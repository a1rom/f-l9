<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Purchase;
use Snowflake\Snowflakes;
use Snowflake\SnowflakeCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchasesItem extends Model
{
    use HasFactory;
    use Snowflakes;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'price_vat_excl',
    ];

    protected $casts = [
        'id' => SnowflakeCast::class,
        'purchase_id' => SnowflakeCast::class,
        'product_id' => SnowflakeCast::class,
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // public function vat()
    // {
    //     return $this->belongsTo(Vat::class);
    // }

}

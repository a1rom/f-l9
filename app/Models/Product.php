<?php

namespace App\Models;

use Snowflake\Snowflakes;
use Snowflake\SnowflakeCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Snowflakes;
    use SnowflakeCast;

    protected $fillable = [
        'name',
        'product_category_id',
        'sku',
        'ean',
        'description',
    ];

    protected $with = [
        'productCategory',
    ];

    protected $casts = [
        'id' => SnowflakeCast::class,
        'product_category_id' => SnowflakeCast::class,
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}

<?php

namespace App\Models;

use Snowflake\Snowflakes;
use Snowflake\SnowflakeCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;
    use Snowflakes;
    use SnowflakeCast;

    protected $fillable = ['name'];

    protected $casts = [
        'id' => SnowflakeCast::class,
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'supplier_id',
        'user_id',
        'vat_id',
        'total_vat',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}

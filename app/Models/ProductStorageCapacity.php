<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStorageCapacity extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'attribute_type',
        'attribute_detail',
        'attribute_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}

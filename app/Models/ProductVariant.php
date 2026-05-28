<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model//biến thể sản phẩm
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'sku', 'color', 'capacity', 
        'price', 'sale_price', 'stock', 'image'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
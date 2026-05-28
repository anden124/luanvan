<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model // hình ảnh sản phẩm
{
    protected $fillable = ['product_id', 'image', 'is_primary'];

    // Hình ảnh này thuộc về 1 Sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model // sản phẩm gốc
{
    use HasFactory;

    protected $fillable = [
        'brand_id', 'category_id', 'name', 'slug', 
        'specifications', 'description', 'status'
    ];

    // Tự động chuyển đổi specifications từ JSON sang Array
    protected $casts = [
        'specifications' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
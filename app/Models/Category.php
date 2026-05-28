<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model // danh mục sản phẩm
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Quan hệ: 1 Danh mục có nhiều Sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
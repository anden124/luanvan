<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model//thuơng hiệu
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'logo'];

    // Quan hệ: 1 Hãng có nhiều Sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
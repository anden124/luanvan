<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model // đánh giá sản phẩm
{
    protected $fillable = ['user_id', 'product_id', 'rating', 'comment'];

    // Ai là người đánh giá?
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Đánh giá cho Sản phẩm nào?
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
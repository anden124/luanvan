<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model //giỏ hàng
{
    protected $fillable = ['user_id', 'variant_id', 'quantity'];

    // Món trong giỏ thuộc về ai?
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Món trong giỏ là điện thoại màu gì/dung lượng bao nhiêu?
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
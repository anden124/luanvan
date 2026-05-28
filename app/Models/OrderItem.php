<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model // chi tiết đơn hàng
{
    protected $fillable = ['order_id', 'variant_id', 'quantity', 'price'];

    // Chi tiết này nằm trong Đơn hàng nào?
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Khách mua phiên bản nào?
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
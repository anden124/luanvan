<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model // đơn hàng tổng
{
    protected $fillable = [
        'user_id', 'shipping_address_id', 'order_code', 
        'total_price', 'payment_method', 'status', 'note'
    ];

    // Đơn hàng thuộc về 1 Khách hàng
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Đơn hàng giao đến 1 Địa chỉ cụ thể
    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    // 1 Đơn hàng có nhiều Chi tiết (món hàng) bên trong
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model // địa chỉ giao hàng
{
    protected $fillable = [
        'user_id', 'full_name', 'phone_number', 
        'address', 'city', 'is_default'
    ];

    // Địa chỉ này thuộc về 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 Địa chỉ có thể được dùng cho nhiều Đơn hàng
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
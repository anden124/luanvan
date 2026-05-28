<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model // thanh toán
{
    protected $fillable = [
        'order_id', 'payment_method', 'transaction_id', 
        'amount', 'status', 'paid_at'
    ];

    // Ép kiểu cho cột paid_at thành dạng ngày tháng để dễ xài các hàm xử lý thời gian (như diffForHumans)
    protected $casts = [
        'paid_at' => 'datetime',
    ];

    // Giao dịch này thanh toán cho Đơn hàng nào?
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
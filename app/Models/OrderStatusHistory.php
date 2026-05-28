<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatusHistory extends Model // lịch sử trạng thái đơn hàng
{
    // Cần khai báo tên bảng vì Laravel sẽ tự đoán là order_status_histories (sai chính tả tiếng Anh một xíu)
    protected $table = 'order_status_history'; 

    protected $fillable = ['order_id', 'status', 'note'];

    // Lịch sử này thuộc về Đơn hàng nào?
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
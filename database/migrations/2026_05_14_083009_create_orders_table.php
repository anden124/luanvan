<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {// đơn hàng tổng
        $table->id();
        $table->foreignId('user_id')->constrained('users');
        // Liên kết địa chỉ, nếu xóa địa chỉ thì set null chứ ko xóa đơn hàng
        $table->foreignId('shipping_address_id')->nullable()->constrained('shipping_addresses')->nullOnDelete();
        $table->string('order_code')->unique(); // Mã đơn hàng (VD: LVTN-12345)
        $table->decimal('total_price', 15, 2); // Tổng tiền
        $table->string('payment_method'); // Phương thức TT (Tiền mặt, VNPay, Momo...)
        $table->integer('status')->default(0); // 0: Chờ xác nhận, 1: Đang giao, 2: Hoàn thành, 3: Đã hủy
        $table->text('note')->nullable(); // Ghi chú của khách
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('orders');
}
};

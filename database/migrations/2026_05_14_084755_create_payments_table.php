<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('payments', function (Blueprint $table) {// bảng giao dịch thanh toán
        $table->id();
        $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
        $table->string('payment_method'); // VNPay, Momo, COD...
        $table->string('transaction_id')->nullable(); // Mã giao dịch trả về từ ví điện tử
        $table->decimal('amount', 15, 2); // Số tiền thanh toán
        $table->integer('status')->default(0); // 0: Chưa thanh toán, 1: Đã thanh toán, 2: Thất bại
        $table->timestamp('paid_at')->nullable(); // Thời gian thanh toán thành công
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('payments');
}
};

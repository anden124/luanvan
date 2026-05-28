<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('order_status_history', function (Blueprint $table) {//bảng lịch sử trạng thái đơn hàng
        $table->id();
        $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
        $table->integer('status'); // Trạng thái vừa được cập nhật
        $table->string('note')->nullable(); // Ghi chú (VD: Giao hàng thất bại do gọi không nghe máy)
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('order_status_history');
}
};

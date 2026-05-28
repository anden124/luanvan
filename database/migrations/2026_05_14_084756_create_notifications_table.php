<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('notifications', function (Blueprint $table) {// bảng thông báo cho người dùng
        $table->id();
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        $table->string('type'); // Loại thông báo (Khuyến mãi, Đơn hàng...)
        $table->text('message'); // Nội dung
        $table->boolean('is_read')->default(false); // Đã đọc chưa
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('notifications');
}
};

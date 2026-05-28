<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('shipping_addresses', function (Blueprint $table) {// địa chỉ giao hàng
        $table->id();
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        $table->string('full_name'); // Tên người nhận
        $table->string('phone_number'); // Số điện thoại nhận hàng
        $table->string('address'); // Địa chỉ chi tiết
        $table->string('city')->nullable(); // Tỉnh/Thành phố
        $table->boolean('is_default')->default(false); // Đánh dấu địa chỉ mặc định
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('shipping_addresses');
}
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('contacts', function (Blueprint $table) { // bảng liên hệ từ khách hàng
        $table->id();
        $table->string('full_name');
        $table->string('phone_number');
        $table->string('email')->nullable();
        $table->text('message'); // Lời nhắn
        $table->boolean('isReply')->default(false); // Trạng thái: Đã phản hồi hay chưa
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('contacts');
}
};

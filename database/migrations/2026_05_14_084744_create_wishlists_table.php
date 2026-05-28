<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('wishlists', function (Blueprint $table) {// bảng sp yêu thích
        $table->id();
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
        
        // Đảm bảo 1 user không thể thêm 1 sản phẩm vào yêu thích 2 lần
        $table->unique(['user_id', 'product_id']);
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('wishlists');
}
};

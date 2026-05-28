<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('reviews', function (Blueprint $table) {// bảng đánh giá sp
        $table->id();
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
        $table->integer('rating'); // Số sao (1 đến 5)
        $table->text('comment')->nullable(); // Nội dung đánh giá
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('reviews');
}
};

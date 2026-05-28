<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('product_variants', function (Blueprint $table) { //bảng biến thể / phiên bảng sp
        $table->id();
        $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
        $table->string('sku')->unique(); // Mã sản phẩm (VD: IP15-256GB-DEN)
        $table->string('color'); // Màu sắc
        $table->string('capacity'); // Dung lượng (128GB, 256GB...)
        $table->decimal('price', 15, 2); // Giá bán
        $table->decimal('sale_price', 15, 2)->nullable(); // Giá khuyến mãi
        $table->integer('stock')->default(0); // Tồn kho
        $table->string('image')->nullable(); // Ảnh riêng của màu đó
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('product_variants');
}
};

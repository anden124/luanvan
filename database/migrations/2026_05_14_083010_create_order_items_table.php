<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('order_items', function (Blueprint $table) {// chi tiết từng món trong đơn 
        $table->id();
        $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
        // Chú ý: Ở đây liên kết với bảng product_variants để biết khách mua màu gì, dung lượng bao nhiêu
        $table->foreignId('variant_id')->constrained('product_variants');
        $table->integer('quantity'); // Số lượng
        $table->decimal('price', 15, 2); // GIÁ LÚC MUA (Lưu lại để sau này đổi giá web không bị ảnh hưởng)
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('order_items');
}
};

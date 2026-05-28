<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('product_images', function (Blueprint $table) {//bảng hình ảnh sản phẩm
        $table->id();
        // Liên kết với bảng products. Khi xóa sản phẩm thì ảnh cũng tự động bị xóa theo (cascade)
        $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
        $table->string('image'); // Đường dẫn lưu file ảnh
        $table->boolean('is_primary')->default(false); // Tùy chọn: Đánh dấu đâu là ảnh chính (ảnh bìa)
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('product_images');
}
};

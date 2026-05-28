<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('categories', function (Blueprint $table) {// bảng danh mục sản phẩm
        $table->id();
        $table->string('name');
        $table->string('slug')->unique(); // Đường dẫn chuẩn SEO (VD: dien-thoai)
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('categories');
}
};

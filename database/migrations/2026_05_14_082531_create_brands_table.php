<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('brands', function (Blueprint $table) {// bảng thương hiệu/hãng
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('logo')->nullable(); // Có thể để trống nếu chưa có logo
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('brands');
}
};

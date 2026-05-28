<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('permissions', function (Blueprint $table) {// bảng quyền hạng
        $table->id();
        $table->string('name')->unique(); // Tên quyền (add_product, edit_user,...)
        $table->timestamps();
    });
}

    public function down(): void
{
    Schema::dropIfExists('permissions');
}
};

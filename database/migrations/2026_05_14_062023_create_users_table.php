<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void {
    Schema::create('users', function (Blueprint $table) {//bảng người dung /tài khoản
        $table->id();
        $table->foreignId('role_id')->nullable()->constrained('roles')->nullOnDelete();//role_id là khóa ngoại để biết người này thuộc nhóm nào.
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('phone_number')->nullable();
        $table->string('address')->nullable();
        $table->string('avatar')->nullable();
        $table->string('google_id')->nullable();
        $table->string('facebook_id')->nullable();
        $table->timestamp('email_verified_at')->nullable();
        $table->boolean('status')->default(1); // 1: Hoạt động, 0: Khóa ( status dùng để khóa tài khoản khi cần.)
        $table->timestamps();
    });
}
public function down(): void
{
    Schema::dropIfExists('users');
}
};

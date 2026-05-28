<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder //tạo sẵn 1 nick admin để đăng nhập vào hệ thống quản trị,
                                // và 1 nick khách hàng để test chức năng của khách hàng
{
    public function run(): void
    {
        // Tài khoản Admin
        User::create([
            'name' => 'Quản trị viên',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'), // Mật khẩu là 123456
            'role_id' => 1, // Số 1 là Admin (tạo ở RoleSeeder)
            'phone_number' => '0987654321',
            'status' => true,
        ]);

        // Tài khoản Khách hàng test
        User::create([
            'name' => 'Khách hàng',
            'email' => 'khachhang@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 3, // Số 3 là Customer
            'phone_number' => '0123456789',
            'status' => true,
        ]);
    }
}
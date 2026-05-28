<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionSeeder extends Seeder// tạo các quyền hệ thống và gán cho các vai trò tương ứng
{
    public function run(): void
    {
        // 1. Danh sách các quyền hệ thống cần có
        $permissions = [
            'view_product',
            'add_product',
            'edit_product',
            'delete_product',
            'manage_orders',
            'manage_users',
        ];

        // 2. Chèn các quyền này vào bảng 'permissions'
        foreach ($permissions as $p) {
            Permission::create(['name' => $p]);
        }

        // 3. Gán TOÀN BỘ quyền cho Admin
        $adminRole = Role::where('name', 'Admin')->first();
        if ($adminRole) {
            // pluck('id') là lấy ra tất cả ID của các quyền vừa tạo
            $adminRole->permissions()->attach(Permission::pluck('id')->toArray());
        }

        // 4. Gán MỘT SỐ quyền cho Staff (Ví dụ: Staff chỉ được xem SP và quản lý đơn)
        $staffRole = Role::where('name', 'Staff')->first();
        if ($staffRole) {
            $staffPermissions = Permission::whereIn('name', ['view_product', 'manage_orders'])->pluck('id');
            $staffRole->permissions()->attach($staffPermissions);
        }
    }
}
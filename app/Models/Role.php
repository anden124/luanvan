<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model// vai trò
{
    protected $fillable = ['name'];

    // 1 Vai trò (VD: Admin) sẽ có nhiều Quyền (Thêm, sửa, xóa...)
    // 'role_permissions' là tên cái bảng trung gian của bạn đó
    public function permissions()
    {
        // Cú pháp này chính là "báo mộng" cho Laravel biết: 
    // "Ê, hãy dùng bảng trung gian có tên là 'role_permissions' để nối 2 thằng này lại nha!"
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    // 1 Vai trò có thể được gán cho nhiều Người dùng
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
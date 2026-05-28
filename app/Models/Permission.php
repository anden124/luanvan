<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model//quyền hạn
{
    protected $fillable = ['name'];

    // Ngược lại: 1 Quyền có thể thuộc về nhiều Vai trò
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
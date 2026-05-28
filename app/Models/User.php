<?php

namespace App\Models;

// Quan trọng: Phải dùng Authenticatable để đăng nhập được
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Các cột được phép chèn dữ liệu vào (Mass Assignment)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone_number',
        'address',
        'avatar',
        'status',
        'google_id',
    ];

    /**
     * Các cột cần ẩn đi khi xuất dữ liệu (ví dụ khi gọi API)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Ép kiểu dữ liệu (Casting)
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel tự mã hóa mật khẩu
        'status' => 'boolean',
    ];

    /**
     * Quan hệ: 1 Người dùng thuộc về 1 Vai trò (Role)
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Quan hệ: 1 Người dùng có thể có nhiều Địa chỉ nhận hàng
     */
    public function shippingAddresses()
    {
        return $this->hasMany(ShippingAddress::class);
    }

    /**
     * Quan hệ: 1 Người dùng có thể có nhiều Đơn hàng
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Quan hệ: 1 Người dùng có nhiều Sản phẩm trong Giỏ hàng
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Quan hệ: 1 Người dùng có thể viết nhiều Đánh giá
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Quan hệ: 1 Người dùng có nhiều Sản phẩm Yêu thích
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Quan hệ: 1 Người dùng có nhiều Thông báo
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
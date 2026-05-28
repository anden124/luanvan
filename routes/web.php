<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\OrderController;
// Login / Register
Route::get('/dang-nhap', [AuthController::class, 'showLogin'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'login']);

Route::get('/dang-ky', [AuthController::class, 'showRegister'])->name('register');
Route::post('/dang-ky', [AuthController::class, 'register']);

// Trang thông tin tài khoản, đổi mật khẩu, đăng xuất
Route::middleware(['auth'])->group(function() {
    Route::get('/tai-khoan', [AuthController::class,'profile'])->name('profile');
    Route::post('/tai-khoan/cap-nhat', [AuthController::class,'updateProfile'])->name('profile.update');

    Route::get('/doi-mat-khau', [AuthController::class,'showPasswordForm'])->name('password.form');
    Route::post('/doi-mat-khau', [AuthController::class,'updatePassword'])->name('password.update');

    Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');
});

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Trang danh sách sản phẩm
Route::get('/san-pham', [ProductController::class, 'index'])->name('client.product');

// Lọc theo brand
Route::get('/san-pham/thuong-hieu/{brand}', [ProductController::class, 'filterByBrand'])->name('client.product.brand');
// Lọc theo category
Route::get('/san-pham/danh-muc/{category}', [ProductController::class, 'filterByCategory'])->name('client.product.category');

// Trang chi tiết sản phẩm
Route::get('/san-pham/{slug}', [ProductController::class, 'show'])->name('client.product.detail');

// Trang liên hệ
Route::get('/lien-he', function () {
    return view('clients.pages.contact');
})->name('client.contact');

// Trang giỏ hàng
Route::get('/gio-hang', [CartController::class, 'index'])->name('client.cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::middleware(['auth'])->group(function() {
    Route::post('/dat-hang', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::get('/lich-su-dat-hang', [OrderController::class, 'history'])->name('order.history');
    Route::delete('/xoa-don-hang/{id}', [OrderController::class, 'delete'])->name('order.delete');
});
Route::get('/xoa-gio-hang', function () {
    session()->forget('cart');
    return redirect()->route('client.cart')->with('success', 'Đã xóa giỏ hàng cũ');
});

// Route dự phòng
Route::fallback(function () {
    return 'Trang web không tồn tại bạn ơi!';
});
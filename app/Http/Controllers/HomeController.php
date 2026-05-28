<?php

namespace App\Http\Controllers; // Hoặc namespace App\Http\Controllers\Client; tùy file của bạn

use App\Http\Controllers\Controller;
use App\Models\Product; // 🌟 BẮT BUỘC PHẢI CÓ DÒNG NÀY ĐỂ GỌI MODEL
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = []; // Tạm thời để mảng rỗng nếu chưa làm slide

        // 🌟 SỬA ĐOẠN NÀY: Dùng Eloquent Product::with(...) để load kèm cả ảnh và biến thể sản phẩm
        $featuredProducts = Product::with(['images', 'variants'])
            ->orderBy('id', 'desc') // Hoặc ->orderBy('views', 'desc') nếu bảng của bạn có cột views
            ->take(4)
            ->get();

        $newProducts = Product::with(['images', 'variants'])
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();

        // Trả dữ liệu sang giao diện trang chủ
        return view('clients.pages.home', compact('slides', 'featuredProducts', 'newProducts'));
    }
}
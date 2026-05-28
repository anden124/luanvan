<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // 1️⃣ Hiển thị danh sách sản phẩm
   public function index(Request $request)
    {
        $keyword = $request->keyword;

        $products = Product::with(['images', 'variants'])
            ->where('status', true)
            ->when($keyword, function ($query, $keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(3);

        return view('clients.pages.product', compact('products', 'keyword'));
    }

    // 2️⃣ Hiển thị chi tiết 1 sản phẩm
    public function show($slug)
    {
        $product = Product::with(['images','variants','brand','category'])
            ->where('slug',$slug)
            ->firstOrFail();

        // Lấy sản phẩm liên quan: cùng category, loại trừ sản phẩm hiện tại
        $relatedProducts = Product::with(['images','variants'])
            ->where('category_id', $product->category_id)
            ->where('id','<>',$product->id)
            ->take(4)
            ->get();

        return view('clients.pages.detail', compact('product','relatedProducts'));
    }
    //lọc sản phẩm theo thương hiệu brand
    public function filterByBrand($brand)
    {
        $products = Product::with(['images','variants'])
            ->whereHas('brand', function($q) use ($brand) {
                $q->where('name', $brand);
            })
            ->where('status', true)
            ->orderBy('id', 'desc')
            ->paginate(3);
            
        return view('clients.pages.product', compact('products', 'brand'));
    }
    //lọc sản phẩm theo danh mục category
    public function filterByCategory($category)
    {
        $products = Product::with(['images','variants'])
            ->whereHas('category', function($q) use ($category) {
                $q->where('name', $category);
            })
            ->where('status', true)
            ->orderBy('id', 'desc')
            ->paginate(3);

        return view('clients.pages.product', compact('products', 'category'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $slug)
    {
        $product = Product::with(['images','variants'])->where('slug', $slug)->firstOrFail();

        $cart = Session::get('cart', []);

        if(isset($cart[$slug])){
            $cart[$slug]['quantity'] += $request->quantity ?? 1;
        } else {
            $cart[$slug] = [
                'name' => $product->name,
                'price' => $product->variants->min('price'),
                'image' => $product->images->first()->image,
                'quantity' => $request->quantity ?? 1
            ];
        }

        Session::put('cart', $cart);

        return redirect()->route('client.cart')->with('success','Đã thêm vào giỏ hàng');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($slug)
    {
        $cart = Session::get('cart', []);
        if(isset($cart[$slug])){
            unset($cart[$slug]);
            Session::put('cart', $cart);
        }
        return redirect()->route('client.cart')->with('success','Đã xóa sản phẩm');
    }
}
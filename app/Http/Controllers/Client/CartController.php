<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('clients.pages.cart', compact('cart'));
    }

    // Thêm sản phẩm vào giỏ
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = Session::get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity'] += $request->quantity ?? 1;
        } else {
            $variant = $product->variants->sortBy('price')->first();

            $cart[$id] = [
                'name' => $product->name,
                'variant_id' => $variant->id,
                'price' => $variant->price,
                'image' => $product->images->first()->image,
                'quantity' => $request->quantity ?? 1
            ];
        }

        Session::put('cart', $cart);
        return redirect()->route('client.cart')->with('success','Đã thêm sản phẩm vào giỏ hàng');
    }

    // Xóa sản phẩm khỏi giỏ
    public function remove($id)
    {
        $cart = Session::get('cart', []);
        if(isset($cart[$id])){
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
        return redirect()->route('client.cart')->with('success','Đã xóa sản phẩm khỏi giỏ hàng');
    }

    // Cập nhật số lượng
    public function update(Request $request, $id)
    {
        $cart = Session::get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $request->quantity;
            Session::put('cart', $cart);
        }
        return redirect()->route('client.cart');
    }

   
}
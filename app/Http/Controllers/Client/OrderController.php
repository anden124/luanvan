<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'address' => 'required',
        ], [
            'address.required' => 'Vui lòng nhập địa chỉ nhận hàng',
        ]);

        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('client.cart')
                ->with('error', 'Giỏ hàng đang trống!');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'shipping_address_id' => null,
            'order_code' => 'DH' . time(),
            'total_price' => $total,
            'payment_method' => 'COD',
            'status' => 0,
            'note' => $request->address,
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
            'order_id' => $order->id,
            'variant_id' => $item['variant_id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
        }

        Session::forget('cart');

        return redirect()->route('client.cart')
            ->with('success', 'Đặt hàng thành công!');
    }

    public function history()
    {
        $orders = Order::with([
                'items.variant.product.images'
            ])
            ->where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();

        return view('clients.pages.history', compact('orders'));
    }
    public function delete($id)
    {
        $order = Order::where('user_id', Auth::id())
            ->findOrFail($id);

        $order->delete();

        return back()->with('success', 'Đã xóa đơn hàng!');
    }
}
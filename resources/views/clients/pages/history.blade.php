@extends('layouts.client')

@section('content')
<section class="breadcrumb header_bg">
    <div class="container">
        <div class="row justify-content-center" style="height:230px;">
            <div class="col-lg-8 text-center" style="padding-top:130px;">
                <h2>Lịch sử đặt hàng</h2>
            </div>
        </div>
    </div>
</section>

<section class="cart_area padding_top">
    <div class="container">

        @if($orders->count() > 0)

            @foreach($orders as $order)
                <div class="cart_inner mb-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    @php
                                                        $product = $item->variant->product ?? null;
                                                        $image = $product && $product->images->first()
                                                            ? $product->images->first()->image
                                                            : null;
                                                    @endphp

                                                    @if($image)
                                                        <img src="{{ asset('assets/clients/img/product/' . $image) }}" style="max-height:50px;">
                                                    @endif
                                                </div>

                                                <div class="media-body">
                                                    <p>
                                                        {{ $product->name ?? 'Sản phẩm' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td>{{ number_format($item->price) }}đ</td>

                                        <td>
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                value="{{ $item->quantity }}" 
                                                readonly 
                                                style="width:70px;"
                                            >
                                        </td>

                                        <td>{{ number_format($item->price * $item->quantity) }}đ</td>

                                        <td>
                                            @if($order->status == 0)
                                                <span class="text-warning font-weight-bold">Chờ xác nhận</span>
                                            @elseif($order->status == 1)
                                                <span class="text-info font-weight-bold">Đang giao</span>
                                            @elseif($order->status == 2)
                                                <span class="text-success font-weight-bold">Đã giao</span>
                                            @elseif($order->status == 3)
                                                <span class="text-danger font-weight-bold">Đã hủy</span>
                                            @else
                                                <span class="text-secondary font-weight-bold">Không xác định</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('order.delete', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button 
                                                    type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')"
                                                >
                                                    Xóa
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="2">
                                        <strong>Địa chỉ nhận hàng:</strong><br>
                                        {{ $order->note }}
                                    </td>

                                    <td>
                                        <strong>Thời gian đặt:</strong><br>
                                        {{ $order->created_at->format('d-m-Y H:i:s') }}
                                    </td>

                                    <td colspan="2">
                                        <strong>Tổng cộng:</strong><br>
                                        {{ number_format($order->total_price) }}đ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach

        @else
            <div class="text-center">
                <h4>Bạn chưa có đơn hàng nào!</h4>
            </div>
        @endif

        <div class="text-right mb-5">
            <a href="{{ route('client.cart') }}" class="btn_1">
                Quay Về Giỏ Hàng
            </a>
        </div>

    </div>
</section>
@endsection
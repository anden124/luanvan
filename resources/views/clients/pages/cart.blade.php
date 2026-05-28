@extends('layouts.client')

@section('content')
<section class="breadcrumb header_bg">
    <div class="container">
        <div class="row justify-content-center" style="height:230px;">
            <div class="col-lg-8 text-center" style="padding-top:130px;">
                <h2>Giỏ Hàng</h2>
            </div>
        </div>
    </div>
</section>

<section class="cart_area padding_top">
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
        @endif

        <div class="row justify-content-end mb-3">
            <div class="col-auto">
                <a href="{{ route('order.history') }}" class="btn btn-light rounded-pill font-weight-bold text-dark px-4 btn-sm">
                    Lịch sử đặt hàng
                </a>
            </div>
        </div>

        <div class="cart_inner">
            <div class="table-responsive">
                @php $total = 0; @endphp

                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(session('cart') && count(session('cart')) > 0)
                            @foreach(session('cart') as $id => $item)
                                @php
                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total += $subtotal;
                                @endphp

                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{ asset('assets/clients/img/product/' . $item['image']) }}" style="max-height: 50px;">
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $item['name'] }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>{{ number_format($item['price']) }}đ</td>

                                    <td>
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            <input class="input-number form-control mr-2" type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" style="width:70px;">
                                            <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                                        </form>
                                    </td>

                                    <td>{{ number_format($subtotal) }}đ</td>

                                    <td>
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="3"><h5 class="font-weight-bold">Tổng cộng:</h5></td>
                                <td colspan="2">
                                    <h4 class="text-danger font-weight-bold">{{ number_format($total) }}đ</h4>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">
                                    <form action="{{ route('order.checkout') }}" method="POST">
                                        @csrf

                                        <div class="form-group mt-3" style="max-width: 500px;">
                                            <label><strong>Nhập địa chỉ nhận hàng:</strong></label>
                                            <textarea 
                                                name="address" 
                                                class="form-control" 
                                                rows="4" 
                                                required
                                            >{{ old('address', Auth::user()->address ?? '') }}</textarea>
                                        </div>

                                        <div class="d-flex justify-content-end mt-4">
                                            <a class="btn_1 mr-3" href="{{ route('client.product') }}">
                                                Tiếp tục mua sắm
                                            </a>

                                            <button type="submit" class="btn_1 checkout_btn_1 border-0">
                                                Đặt Hàng
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Giỏ hàng đang trống!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
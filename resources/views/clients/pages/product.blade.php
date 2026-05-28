@extends('layouts.client')

@section('content')
<section class="breadcrumb header_bg">
        <div class="container">
            <div class="row justify-content-center" style="height:230px;">
                <div class="col-lg-8 text-center" style="padding-top:130px;">
                    <h2>Sản Phẩm</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Danh Mục Sản Phẩm</h3>
                            </div>
                            <div class="widgets_inner">
                              <ul class="list">

                        {{-- ĐIỆN THOẠI --}}
                        <li class="dropdown-category">
                            <a href="#">
                                <i class="fa fa-mobile"></i>
                                Điện thoại thông minh
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{ route('client.product.brand', 'Apple') }}">
                                        <i class="fa fa-apple"></i> Apple
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('client.product.brand', 'Samsung') }}">
                                        <i class="fa fa-mobile"></i> Samsung
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('client.product.brand', 'Xiaomi') }}">
                                        <i class="fa fa-mobile"></i> Xiaomi
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('client.product.brand', 'Oppo') }}">
                                        <i class="fa fa-mobile"></i> Oppo
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- MÁY TÍNH BẢNG --}}
                        <li class="dropdown-category">
                            <a href="#">
                                <i class="fa fa-tablet"></i>
                                Máy tính bảng
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="{{ route('client.product.brand', 'iPad') }}">
                                        <i class="fa fa-tablet"></i> iPad
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-tablet"></i> Samsung Tab
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-tablet"></i> Xiaomi Pad
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- PHỤ KIỆN --}}
                        <li class="dropdown-category">
                            <a href="#">
                                <i class="fa fa-headphones"></i>
                                Phụ kiện
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-headphones"></i> Tai nghe
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('client.product.brand', 'Anker','Baseus') }}">
                                        
                                        <i class="fa fa-battery-full"></i> Sạc dự phòng
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-plug"></i> Cáp sạc
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-mobile"></i> Ốp lưng
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                            </div>
                        </aside>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row align-items-center latest_product_inner">
                        @foreach($products as $item)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item text-center">
                                <a href="{{ route('client.product.detail', $item->slug) }}">
                                    <img src="{{ asset('assets/clients/img/product/' . $item->images->first()->image) }}" alt="{{ $item->name }}" class="img-fluid">
                                </a>
                                <div class="single_product_text">
                                    <h4 class="font-weight-bold"><a href="{{ route('client.product.detail', $item->slug) }}" style="color:#333;">{{ $item->name }}</a></h4>
                                    <h3>{{ number_format($item->variants->min('price')) }}đ</h3>
                                    <a href="{{ route('client.product.detail', $item->slug) }}" class="add_cart">+ Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                   <div class="col-lg-12 text-center mt-4">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Sản Phẩm Nổi Bật 🌟</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row align-items-center latest_product_inner">
                        @foreach($products as $item)
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_product_item text-center">
                                    <a href="{{ route('client.product.detail', $item->slug) }}">
                                        <img src="{{ asset('assets/clients/img/product/' . $item->images->first()->image) }}" alt="{{ $item->name }}" class="img-fluid" style="max-width:230px; height:auto; margin:0 auto; display:block;">
                                    </a>
                                    <div class="single_product_text">
                                        <h4 class="font-weight-bold">
                                            <a href="{{ route('client.product.detail', $item->slug) }}" style="color:#333;">{{ $item->name }}</a>
                                        </h4>
                                        <h3>{{ number_format($item->variants->min('price')) }}đ</h3>
                                        <a href="{{ route('client.product.detail', $item->slug) }}" class="add_cart">+ Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
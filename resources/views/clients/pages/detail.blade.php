@extends('layouts.client')

@section('content')
     <section class="breadcrumb header_bg">
        <div class="container">
            <div class="row justify-content-center" style="height:230px;">
                <div class="col-lg-8 text-center" style="padding-top:130px;">
                    <h2>Chi Tiết Sản Phẩm</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="product_image_area section_padding">
        <div class="container">
            <div class="row s_product_inner justify-content-between">
                <div class="col-lg-5 col-xl-5 text-center">
                    <div class="single_product_img">
                        <img src="{{ asset('assets/clients/img/product/' . $product->images->first()->image) }}" class="img-fluid" style="max-height: 380px; object-fit: contain;">
                    </div>
                </div>

                <div class="col-lg-1 d-flex flex-column justify-content-start align-items-center">
                    <div class="mb-2 p-1 border rounded" style="cursor: pointer;"><img src="{{ asset('assets/clients/img/product/' . $product->images->first()->image) }}" style="max-height: 65px; object-fit: contain;"></div>
                    <div class="mb-2 p-1 border rounded" style="cursor: pointer;"><img src="{{ asset('assets/clients/img/product/' . $product->images->first()->image) }}" style="max-height: 65px; object-fit: contain; transform: scaleX(-1);"></div>
                    <div class="mb-2 p-1 border rounded" style="cursor: pointer;"><img src="{{ asset('assets/clients/img/product/' . $product->images->first()->image) }}" style="max-height: 65px; object-fit: contain; opacity: 0.6;"></div>
                </div>
                
                <div class="col-lg-5 col-xl-5">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>
                        <h2>{{ number_format($product->variants->min('price')) }}đ</h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Danh mục</span> : Điện thoại thông minh</a></li>
                            <li><a href="#"><span>Tình trạng</span> : Còn hàng</a></li>
                        </ul>
                        <p>{{ $product->description }}</p>
                        
                        <div class="card_area d-flex align-items-center">
                                <div class="product_count d-inline-block">
                                    <span class="inumber_decrement"> <i class="ti-minus"></i></span>
                                    <input class="input-number" type="number" name="quantity" value="1" min="1" max="10">
                                    <span class="number_increment"> <i class="ti-plus"></i></span>
                                </div>

                                <form action="{{ route('cart.add', $product->variants->first()->id) }}" method="POST" class="ml-3">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1" class="quantity-input">
                                    <button type="submit" class="btn_3">THÊM VÀO GIỎ HÀNG</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3 class="mb-4 font-weight-bold" style="color: #222;">Thông số kỹ thuật</h3>
                    <table class="table table-striped">
                        <tbody>
                            <tr><td style="width: 30%; color: #888;">Kích thước màn hình</td><td>6.7 inches</td></tr>
                            <tr><td style="color: #888;">Chipset</td><td>Apple A15 Bionic (hoặc tương đương)</td></tr>
                            <tr><td style="color: #888;">Bộ nhớ RAM</td><td>6 GB / 8 GB</td></tr>
                            <tr><td style="color: #888;">Hệ điều hành</td><td>iOS / Android</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
                        @foreach($relatedProducts as $item)
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_product_item text-center">
                                    <a href="{{ route('client.product.detail', $item->slug) }}">
                                        <img src="{{ asset('assets/clients/img/product/' . $item->images->first()->image) }}" 
                                            alt="{{ $item->name }}" 
                                            class="img-fluid" 
                                            style="max-width:230px; height:auto; margin:0 auto; display:block;">
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
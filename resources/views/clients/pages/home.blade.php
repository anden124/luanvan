@extends('layouts.client')

@section('content')
   <section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">

                    <!-- Slide 1 -->
                    <div class="single_banner_slider">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>iPhone 13 <br>Series</h1>
                                        <p>Chính thức mở bán iPhone 13 series bản Xanh lá; Apple chỉ đổi màu máy, nhưng được săn đón rất nhiều!!!</p>
                                        <a href="{{ route('client.product') }}" class="btn_2">MUA NGAY</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="{{ asset('assets/clients/img/product/iphone-13-pro-max-10_1.png') }}" alt="banner">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="single_banner_slider">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Samsung Galaxy <br>S22 Ultra</h1>
                                        <p>Flagship Samsung 2022, bút S Pen quyền năng, trải nghiệm mượt mà và camera đỉnh cao.</p>
                                        <a href="{{ route('client.product') }}" class="btn_2">MUA NGAY</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="{{ asset('assets/clients/img/product/Samsung Galaxy S22 Ultra 3.webp') }}" alt="banner">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="single_banner_slider">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Xiaomi Mi 11 <br>Lite 5G</h1>
                                        <p>Mỏng nhẹ, màn hình 90Hz, camera sắc nét, trải nghiệm tuyệt vời cho giới trẻ.</p>
                                        <a href="{{ route('client.product') }}" class="btn_2">MUA NGAY</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="{{ asset('assets/clients/img/product/Xiaomi Mi 11 Lite 5G 1.webp') }}" alt="banner">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Khởi tạo Owl Carousel -->
    <script>
    $(document).ready(function(){
        $('.banner_slider').owlCarousel({
            loop:true,
            items:1,
            margin:0,
            nav:true,               // Hiển thị nút next/prev
            dots:true,              // Hiển thị chấm chỉ báo
            autoplay:true,          // Tự chạy
            autoplayTimeout:4000,   // 4 giây / slide
            autoplayHoverPause:true // Dừng khi hover
        });
    });
    </script>

    <!-- CSS để slide full width và responsive -->
    <style>
        .single_banner_slider {
            height: 400px; /* tuỳ chỉnh chiều cao */
        }
        .single_banner_slider img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }
        .banner_text_iner h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .banner_text_iner p {
            font-size: 1.1rem;
            margin: 15px 0;
        }
    </style>
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
                        @foreach($featuredProducts as $item)
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <a href="{{ route('client.product.detail', $item->slug) }}">
                                    <img src="{{ asset('assets/clients/img/product/' . $item->images->first()->image) }}" alt="{{ $item->name }}">
                                </a>
                                <div class="single_product_text text-left">
                                    <h4 class="font-weight-bold"><a href="{{ route('client.product.detail', $item->slug) }}" style="color:#333;">{{ $item->name }}</a></h4>
                                    <h3>{{ number_format($item->variants->min('price')) }}đ</h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Sản Phẩm Mới Nhất ✨</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center latest_product_inner">
                @foreach($newProducts as $item)
                <div class="col-lg-3 col-sm-6">
                    <div class="single_product_item">
                        <a href="{{ route('client.product.detail', $item->slug) }}">
                            <img src="{{ asset('assets/clients/img/product/' . $item->images->first()->image) }}" alt="{{ $item->name }}">
                        </a>
                        <div class="single_product_text text-left">
                            <h4 class="font-weight-bold"><a href="{{ route('client.product.detail', $item->slug) }}" style="color:#333;">{{ $item->name }}</a></h4>
                            <h3>{{ number_format($item->variants->min('price')) }}đ</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    
@endsection
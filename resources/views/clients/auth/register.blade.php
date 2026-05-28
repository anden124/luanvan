@extends('layouts.client')

@section('content')

<!-- breadcrumb start-->
<section class="breadcrumb header_bg">
        <div class="container">
            <div class="row justify-content-center" style="height:230px;">
                <div class="col-lg-8 text-center" style="padding-top:130px;">
                    <h2>Đăng Ký</h2>
                </div>
            </div>
        </div>
    </section>
<!-- breadcrumb end-->

<!--================ register_part Area =================-->
<section class="login_part">
    <div class="container">
        <div class="col-lg-6 col-md-6" style="margin:auto;">
            <div class="login_part_form">
                <div class="login_part_form_iner">

                    <h3>Tạo Tài Khoản</h3>

                    {{-- Hiển thị lỗi validate --}}
                    @if ($errors->any())
                        <p class="text-danger ml-3 mb-3" style="text-align: center;">
                            {{ $errors->first() }}
                        </p>
                    @endif

                    {{-- Hiển thị thông báo --}}
                    @if (session('success'))
                        <p class="text-success ml-3 mb-3" style="text-align: center;">
                            {{ session('success') }}
                        </p>
                    @endif

                    <form class="row contact_form" action="{{ route('register') }}" method="POST" novalidate="novalidate">
                        @csrf

                        <div class="col-md-12 form-group p_star">
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control" 
                                value="{{ old('name') }}" 
                                placeholder="Họ Tên" 
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <input 
                                type="email" 
                                name="email" 
                                class="form-control" 
                                value="{{ old('email') }}" 
                                placeholder="Email" 
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <input 
                                type="text" 
                                name="phone" 
                                class="form-control" 
                                value="{{ old('phone') }}" 
                                placeholder="SDT" 
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <input 
                                type="password" 
                                name="password" 
                                class="form-control" 
                                placeholder="Mật Khẩu" 
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                class="form-control" 
                                placeholder="Nhập Lại Mật Khẩu" 
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn_3">
                                Đăng Ký
                            </button>

                            <div class="col-md-12 form-group p_star">
                                <a href="{{ route('login') }}" class="btn_3" style="text-align: center;">
                                    Quay Về Đăng Nhập
                                </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================ register_part end =================-->

@endsection
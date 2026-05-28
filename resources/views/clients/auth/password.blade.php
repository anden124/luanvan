@extends('layouts.client')

@section('content')

<!-- breadcrumb start-->
<section class="breadcrumb header_bg">
        <div class="container">
            <div class="row justify-content-center" style="height:230px;">
                <div class="col-lg-8 text-center" style="padding-top:130px;">
                    <h2>Thông Tin Tài Khoản</h2>
                </div>
            </div>
        </div>
    </section>
<!-- breadcrumb end-->

<!--================ password_part Area =================-->
<section class="login_part">
    <div class="container">
        <div class="col-lg-6 col-md-6" style="margin:auto;">
            <div class="login_part_form">
                <div class="login_part_form_iner">

                    {{-- Hiển thị lỗi --}}
                    @if(session('error'))
                        <p class="text-danger ml-3 mb-3" style="text-align: center;">
                            {{ session('error') }}
                        </p>
                    @endif

                    {{-- Hiển thị thành công --}}
                    @if(session('success'))
                        <p class="text-success ml-3 mb-3" style="text-align: center;">
                            {{ session('success') }}
                        </p>
                    @endif

                    {{-- Hiển thị lỗi validate --}}
                    @if ($errors->any())
                        <p class="text-danger ml-3 mb-3" style="text-align: center;">
                            {{ $errors->first() }}
                        </p>
                    @endif

                    <form class="row contact_form" action="{{ route('password.update') }}" method="POST" novalidate="novalidate">
                        @csrf

                        <div class="col-md-12 form-group p_star">
                            <label>Tài Khoản (Email)</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                value="{{ Auth::user()->email }}" 
                                readonly
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <label>Mật Khẩu Cũ*</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="current_password" 
                                placeholder="Nhập mật khẩu cũ"
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <label>Mật Khẩu Mới*</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="password" 
                                placeholder="Mật khẩu mới"
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <label>Nhập Lại Mật Khẩu Mới*</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="password_confirmation" 
                                placeholder="Nhập lại mật khẩu mới"
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn_3">
                                Đổi Mật Khẩu
                            </button>

                            <a href="{{ route('profile') }}" class="btn_3" style="text-align: center;">
                                Hủy
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================ password_part end =================-->

@endsection
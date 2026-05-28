@extends('layouts.client')

@section('content')

<!-- breadcrumb start-->
<section class="breadcrumb header_bg">
        <div class="container">
            <div class="row justify-content-center" style="height:230px;">
                <div class="col-lg-8 text-center" style="padding-top:130px;">
                    <h2>Đăng Nhập</h2>
                </div>
            </div>
        </div>
    </section>
<!-- breadcrumb end-->

<!--================ login_part Area =================-->
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Mới đến cửa hàng của chúng tôi?</h2>
                        <p>
                            Ai lòng đăng ký tài khoản để có trải nghiệm tốt nhé.
                        </p>
                        <a href="{{ route('register') }}" class="btn_3">
                            Đăng Ký
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">

                        <h3>
                            Chào Mừng Trở Lại ! <br>
                            Đăng Nhập Ngay
                        </h3>

                        @if(session('error'))
                            <p class="text-danger mb-3">
                                {{ session('error') }}
                            </p>
                        @endif

                        @if ($errors->any())
                            <p class="text-danger mb-3">
                                {{ $errors->first() }}
                            </p>
                        @endif

                        @if(session('success'))
                            <p class="text-success mb-3">
                                {{ session('success') }}
                            </p>
                        @endif

                        <form class="row contact_form" action="{{ route('login') }}" method="POST" novalidate="novalidate">
                            @csrf

                            <div class="col-md-12 form-group p_star">
                                <input 
                                    type="email" 
                                    class="form-control" 
                                    name="email" 
                                    value="{{ old('email') }}"
                                    placeholder="Tài khoản (Email)"
                                    required
                                >
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input 
                                    type="password" 
                                    class="form-control" 
                                    name="password" 
                                    placeholder="Mật khẩu"
                                    required
                                >
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                    Đăng Nhập
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--================ login_part end =================-->

@endsection
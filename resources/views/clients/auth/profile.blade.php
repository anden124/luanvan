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

<!--================ profile_part Area =================-->
<section class="login_part">
    <div class="container">
        <div class="col-lg-6 col-md-6" style="margin:auto;">
            <div class="login_part_form">
                <div class="login_part_form_iner">

                    @if(session('success'))
                        <p class="text-success ml-3 mb-3" style="text-align: center;">
                            {{ session('success') }}
                        </p>
                    @endif

                    @if(session('error'))
                        <p class="text-danger ml-3 mb-3" style="text-align: center;">
                            {{ session('error') }}
                        </p>
                    @endif

                   <form class="row contact_form" 
                        action="{{ route('profile.update') }}" 
                        method="POST" 
                        enctype="multipart/form-data" 
                        novalidate="novalidate">
                        @csrf

                        <div class="col-md-12 form-group p_star">
                            <label>Tài Khoản (Email)</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                name="email" 
                                value="{{ $user->email }}" 
                                readonly
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <label>Họ Tên *</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                value="{{ $user->name }}" 
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <label>SDT *</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="phone_number"
                                value="{{ $user->phone_number ?? '' }}"
                                placeholder="Nhập số điện thoại"
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <label>Địa Chỉ</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="address" 
                                value="{{ $user->address ?? '' }}" 
                                placeholder="Nhập địa chỉ"
                            >
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <label>Ảnh Đại Diện</label>
                            <br>

                            <input 
                                type="file" 
                                name="avatar" 
                                class="form-control"
                            >

                            @if(!empty($user->avatar))
                                <div class="mt-3">
                                    <img 
                                        src="{{ asset('uploads/users/' . $user->avatar) }}" 
                                        alt="avatar" 
                                        width="60" 
                                        height="60" 
                                        style="border-radius: 50%; object-fit: cover;"
                                    >
                                </div>
                            @else
                                <div class="mt-3">
                                    <img 
                                        src="{{ asset('assets/clients/img/user.png') }}" 
                                        alt="avatar" 
                                        width="60" 
                                        height="60" 
                                        style="border-radius: 50%; object-fit: cover;"
                                    >
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn_3">
                                Cập Nhật
                            </button>

                            <a href="{{ route('home') }}" class="btn_3" style="text-align: center;">
                                Hủy
                            </a>

                            <a href="{{ route('password.form') }}" class="btn_3" style="text-align: center;">
                                Đổi Mật Khẩu
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================ profile_part end =================-->

@endsection
@extends('layouts.client')

@section('content')
    <!-- Breadcrumb -->
    <section class="breadcrumb header_bg">
        <div class="container">
            <div class="row justify-content-center" style="height:230px;">
                <div class="col-lg-8 text-center" style="padding-top:130px;">
                    <h2>Thông Tin Liên Hệ</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section section_padding" style="margin: 100px 0;">
        <div class="container">
            <div class="row">
                <!-- Map -->
                <div class="col-lg-8 mb-4">
                    <div id="map">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4645.333821956979!2d106.5868882757433!3d10.699147789445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175327746037c9b%3A0x4bfee65833f6f17d!2zRMawxqFuZyDEkMOsbmggQ8O6YywgVMOibiBOaOG7sXQsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e1!3m2!1svi!2s!4v1779278817544!5m2!1svi!2s"
                            width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4">
                    <div class="media contact-info mb-3">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Địa Chỉ</h3>
                            <p>D1/12,ẤP 45, ĐƯỜNG DƯƠNG ĐÌNH CÚC,XÃ TÂN NHỰT,HUYỆN BÌNH CHÁNH,TP.HCM</p>
                        </div>
                    </div>
                    <div class="media contact-info mb-3">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>Hotline</h3>
                            <p>0976950125(8h00 - 22h00)</p>
                        </div>
                    </div>
                    <div class="media contact-info mb-3">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>Email</h3>
                            <p>lequocan124@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center mb-4">
                        <h2>Gửi Liên Hệ</h2>
                        <p>Điền thông tin và gửi thắc mắc hoặc đề xuất cho chúng tôi</p>
                    </div>

                    <form action="{{ route('client.contact') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Họ và Tên</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ và tên" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject">Tiêu đề</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Tiêu đề" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="message">Nội dung</label>
                            <textarea name="message" id="message" rows="5" class="form-control" placeholder="Nhập nội dung" required></textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn_3">Gửi Liên Hệ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
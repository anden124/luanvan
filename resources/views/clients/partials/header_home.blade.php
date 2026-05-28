<section class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}"> 
                        <img src="{{ asset('assets/clients/img/logo.png') }}" alt="logo" style="height: 50px;"> 
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.product') }}">Sản phẩm</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.contact') }}">Liên hệ</a>
                            </li>

                            <li class="nav-item dropdown">
                                @auth
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Chào {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_3">
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            Thông Tin Tài Khoản
                                        </a>

                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item" style="border: none; background: none; width: 100%; text-align: left; cursor: pointer;">
                                                Đăng Xuất
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tài Khoản
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_3">
                                        <a class="dropdown-item" href="{{ route('register') }}">
                                            Đăng Ký
                                        </a>
                                        <a class="dropdown-item" href="{{ route('login') }}">
                                            Đăng Nhập
                                        </a>
                                    </div>
                                @endauth
                            </li>

                        </ul>
                    </div>
                    
                    <div class="hearer_icon d-flex align-items-center">
                        <a id="search_1" href="javascript:void(0)" style="cursor: pointer; margin-right: 20px;">
                            <i class="ti-search" style="font-size:20px"></i>
                        </a>

                       <div>
                            <a href="{{ route('client.cart') }}" id="navbarDropdown3">
                                <i class="fa fa-cart-plus" style="font-size:20px; color: #333;"></i>

                                @php
                                    $cart = session('cart', []);
                                    $cartCount = collect($cart)->sum('quantity');
                                @endphp

                                <span class='badge badge-danger' style='vertical-align: top; margin:-10px 0px 0px -10px; font-size:10px'>
                                    {{ $cartCount }}
                                </span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    
    <div class="search_input" id="search_input_box" style="display: none;">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner" 
                action="{{ route('client.product') }}" 
                method="GET" 
                autocomplete="off">

                <input 
                    type="text" 
                    class="form-control" 
                    name="keyword"
                    value="{{ request('keyword') }}"
                    placeholder="Nhập tên sản phẩm cần tìm"
                >

                <button type="submit" class="btn"></button>

                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchIcon = document.getElementById("search_1");
        const searchBox = document.getElementById("search_input_box");
        const closeSearch = document.getElementById("close_search");

        if (searchIcon && searchBox) {
            searchIcon.addEventListener("click", function () {
                searchBox.style.display = "block";
            });
        }

        if (closeSearch && searchBox) {
            closeSearch.addEventListener("click", function () {
                searchBox.style.display = "none";
            });
        }
    });
</script>
</section>
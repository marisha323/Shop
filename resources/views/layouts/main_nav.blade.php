<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Add your CSS and other head content here -->
    <link rel="stylesheet" href="{{ asset('css/main_nav.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ropa+Sans:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div class="top_header_el">
        <img class="logo_v" src="/icons/logo_vv.png" alt="">

        <div class="login_ic"><a href="">
                <img src="/icons/profile_Icon.png" alt="" class="p_icon"></a>
        </div>

        @if (Route::has('login'))

            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 flex items-center">

                @auth
                    <a  href="{{ url('/dashboard') }}" class="links_h1 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="links_h1 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">Log in |</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="links_h1 ml-4 m-3 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">Register</a>
                    @endif
                @endauth


            </div>
        @endif

    </div>
    <div class="bottom_header_el">

{{--        <!-- SEARCH -->--}}
{{--        <form class="form-inline d-flex my-2 my-lg-0" action="{{ route('search') }}" method="GET">--}}
{{--            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query" value="{{ request()->input('query') }}">--}}
{{--            <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--        </form>--}}

        <div class="search-container">
            <form class="form-inline d-flex my-2 my-lg-0" action="{{ route('search') }}" method="GET">
            <input class="search_engine" type="search" placeholder="Search" aria-label="Search" name="query" value="{{ request()->input('query') }}"/>
            <img class="s_icon" src="/icons/search.png" alt="Search Icon">
            </form>
        </div>
        <div class="login_is">
            <h1 class="links_h11"><a href="{{ route('welcome') }}">Home</a></h1>
            <h1 class="links_h11"><a href="{{ route('products.home') }}">Products</a></h1>
            <h1 class="links_h11"><a href="{{ route('information') }}">Opportunities</a></h1>
                <a href="{{ route('cart.index') }}">
            <div class="cart-container">
                    <img class="p_icon" src="/icons/cart_icon.png" alt="Cart Icon">
                    <div class="cart-count">3</div> <!-- Динамічно змінюється, в залежності від кількості товарів у кошику -->
            </div>
                </a>
        </div>
    </div>
</header>


<main>
    @yield('content')
</main>

<footer>
    <div class="footer_info">
        <div class="footer_con">
            <h1 class="h1_f">INFORMATION</h1>
            <div class="links_f">
                <a href="">ABOUT US</a>
                <a href="">DELIVERY AND PAYMENT INFORMATION</a>
                <a href="">SECURITY POLICY OF THE SITE</a>
                <a href="">TERMS OF AGREEMENT</a>
            </div>
        </div>
        <div class="footer_con">
            <h1 class="h1_f">SUPPORT</h1>
            <div class="links_f">
                <a href="">MAP OF SITE</a>
                <a href="">PURCHASE RETURNS</a>
                <a href="">CONNECT US</a>
            </div>
        </div>
        <div class="footer_con">
            <h1 class="h1_f">PERSONAL AREA</h1>
            <div class="links_f">
                <a href="">PERSONAL AREA</a>
                <a href="">HISTORY OF ORDERS</a>
                <a href="">FEATURED PRODUCTS</a>
                <a href="">NEWSLETTER</a>
            </div>
        </div>
    </div>
    <div class="social_net">
        <p>OUR STORE ON SOCIAL NETWORKS</p>
        <div class="social_d">
            <a href=""><img src="/icons/insta_Ic.png" alt="" class="f_img"></a>
            <a href=""><img src="/icons/facebook_Ic.png" alt="" class="f_img"></a>

        </div>
        <p>PAYMENT OPTIONS</p>
        <div>
            <h1 class="h1_card"><img class="card_img" src="/icons/visa_Ic.png" alt="">
                <hr class="c_hr">
                <img class="card_img" src="/icons/mastercard_Ic.png" alt="">
                <hr class="c_hr">
                <img class="card_img" src="/icons/google_Ic.png" alt=""></h1>
        </div>
    </div>
</footer>
</body>
</html>

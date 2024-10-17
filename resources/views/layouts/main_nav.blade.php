
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
            <h1 class="links_h1"><a href="/">ENG</a> | <a href="/">RU</a></h1>
            <div class="login_ic"><a href="">
                <img src="/icons/profile_Icon.png" alt="" class="p_icon"></a>
                <h1 class="links_h1"><a href="">Login</a> | <a href="">Register</a></h1>
            </div>
        </div>
        <div class="bottom_header_el">
            <img class="logo_v" src="/icons/logo_vv.png" alt="">
            <input class="search_engine" type="text" placeholder="Search">
            <div class="login_is"><a href="">
                <h1 class="links_h11"><a href="">Home</a></h1>
                <h1 class="links_h11"><a href="">Products</a></h1>
                <h1 class="links_h11"><a href="">FAQ</a></h1>
                <h1 class="links_h11"><a href="">Shop</a></h1>
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
            <h1 class="h1_card"><img class="card_img" src="/icons/visa_Ic.png" alt=""> <hr class="c_hr"> <img class="card_img" src="/icons/mastercard_Ic.png" alt=""> <hr class="c_hr"> <img class="card_img" src="/icons/google_Ic.png" alt=""> </h1>
        </div>
       </div>
    </footer>
</body>
</html>
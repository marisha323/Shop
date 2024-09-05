
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Add your CSS and other head content here -->
    <link rel="stylesheet" href="{{ asset('css/main_nav.css') }}">
</head>
<body>
    <header>
        <div class="nav_bar_T1">
            <div class="lng_selection">
                <a href="">ENG</a>
                <span>|</span>
                <a href="">RU</a>
            </div>
            <div class="sel_Log_Reg">
                <img src="" alt="">
                <a href="">Login</a>
                <span>|</span>
                <a href="">Register</a>
            </div>
        </div>
        <div class="nav_bar_T2">
            <div class="search_bar">
                <img class="home_logo" src="/images/logo_home.png" alt="">
                <form class="form-inline d-flex my-2 my-lg-0" action="{{ route('search') }}" method="GET">
                    <input class="form-control me-2 search_h" type="search" placeholder="Search" aria-label="Search" name="query" value="{{ request()->input('query') }}">
                    {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
                </form>
            </div>
           <div class="navbar_selection">
                <a href="">Home</a>
                <a href="">Products</a>
                <a href="">FAQ</a>
                <a href="">Shop</a>
           </div>

        </div>
        <div class="wrapper">
            <div class="middle_section">
                <h1 class="w_h1">WELCOME</h1>
                <h1>VENDELLA DEMIAN</h1>
                <p>“If you want to look into the future with confidence, you need to build it yourself. You can take responsibility for your future life only if you learn to control your sources of income. And for this you need your own business.”</p>
                <div class="btn_section">
                    <a href="">Contact</a>
                    <a href="">Opportunities</a>
                    <a href="">Learn More</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
       <h1>Footer</h1>
    </footer>
</body>
</html>
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@extends('layouts.main_nav')

@section('title', 'Vendella Demian')

@section('styles')
    <!-- Add additional styles here if needed -->
@endsection
@section('content')
<div>
    <div class="slide_show">

    </div>
</div>
<div class="top_con"></div>
<div class="inner_txt_welcome">
    <h2 class="wh">WELCOME</h2>
    <h1 class="nh">VENDELLA DEMIAN</h1>
    <p>If you want to look into the future with confidence, you need to build it yourself. You can take responsibility for your future life only if you learn to control your sources of income. And for this you need your own business.</p>
</div>
<div class="home_body">
    <div class="container_menu_scroller">
        <div class="menu">
            <div class="option_m">
                <a href="/" class="opt"><p>Women's Clothing</p> <img class="arrow" src="/icons/arrow_y.png" alt=""></a>
                <hr>
            </div>
            <div class="option_m">
                <a href="/" class="opt"><p>Men's Clothing</p> <img class="arrow" src="/icons/arrow_y.png" alt=""></a>
                <hr>
            </div>
            <div class="option_m">
                <a href="/" class="opt"><p>Accessories</p> <img class="arrow" src="/icons/arrow_y.png" alt=""></a>
                <hr>
            </div>
            <div class="option_m">
                <a href="/" class="opt"><p>Seasonal Collections</p> <img class="arrow" src="/icons/arrow_y.png" alt=""></a>
                <hr>
            </div>
            <div class="option_m">
                <a href="/" class="opt"><p>Special Collections</p> <img class="arrow" src="/icons/arrow_y.png" alt=""></a>
                <hr>
            </div>
            <div class="option_m">
                <a href="/" class="opt"><p>Most Viewed</p> <img class="arrow" src="/icons/arrow_y.png" alt=""></a>
                <hr>
            </div>
        </div>
        <div class="scroller">
            <div class="scroller-inner">
                <img src="/images/bg_slideshow.png" alt="">
                <img src="/images/bg_slideshow.png" alt="">
                <img src="/images/bg_slideshow.png" alt="">
                <img src="/images/bg_slideshow.png" alt="">
                <img src="/images/bg_slideshow.png" alt="">
            </div>
        </div>
    </div>
    <h1 class="oevb_h1">Our Exclusive Vendella Brands</h1>
    <div class="brands_scroller">
    <div class="brands">
        <div class="brand">
            <img class="brand_img" src="/images/chanel1.png" alt="">
            <div class="name_brand">
                <img class="NA_brand" src="/images/chanel.png" alt="">
            </div>
        </div>
        <div class="brand">
            <img class="brand_img" src="/images/Dior-1.png" alt="">
            <div class="name_brand">
                <img class="dior_brand" src="/images/dior_logo.png" alt="">
            </div>
        </div>
        <div class="brand">
            <img class="brand_img" src="/images/fendi_bags.png" alt="">
            <div class="name_brand">
                <img class="fendi_brand" src="/images/fendi.png" alt="">
            </div>
        </div>
        <div class="brand">
            <img class="brand_img" src="/images/gucci_bags.png" alt="">
            <div class="name_brand">
                <img class="gucci_brand" src="/images/gucci.png" alt="">
            </div>
        </div>
        <div class="brand">
            <img class="brand_img" src="/images/prada_bags.png" alt="">
            <div class="name_brand">
                <img class="prada_brand" src="/images/prada.png" alt="">
            </div>
        </div>
        <div class="brand">
            <img class="brand_img" src="/images/louis_vuitton_bags.png" alt="">
            <div class="name_brand">
                <img class="louis_vuitton_brand" src="/images/louis_vuitton.png" alt="">
            </div>
        </div>
        <!-- Add more brands as needed -->
    </div>

</div>
<h1 class="oevb_h1">All Products</h1>
<div class="products">
    @for ($i = 0; $i < 10; $i++)
    <div class="product-card">
        <div class="image-container">
            <img src="/images/bag.png" alt="Product Image" class="product-image" />
            <div class="image-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
        <div class="product-info">
            <h3 class="product-name">product1</h3>
            <p class="product-price">150$</p>
            <button class="add-to-cart">Add to cart</button>
        </div>
    </div>

    @endfor
</div>
<button class="btn_load_more">Load More</button>
<div class="information_con">
    <div class="inf_div">
        <div class="inf">
            <img src="/icons/coffee_icon.png" alt="">
            <p>We have the most delicious hot drinks. Coffee tea brought from different parts of the world, not any research processing, all natural product.</p>
        </div>
        <div class="inf">
            <img src="/icons/money_icon.png" alt="">
            <p>Our product is of high quality on the coffee sales market, and we provide the opportunity to drink high-quality coffee at an affordable price.</p>
        </div>
    </div>
    <div class="inf_div">
        <div class="inf">
            <img src="/icons/handshake_icon.png" alt="">
            <p>In this company you can become an independent business partner and build your own personal business with our product Vendella Demian</p>
        </div>
        <div class="inf">
            <img src="/icons/growth_icon.png" alt="">
            <p>Realize dreams with us. Learn and grow your business. You can't earn a million dollars alone, but with a team, you can earn much more.</p>
        </div>
    </div>
</div>
</div>
    {{-- @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 flex items-center">
            <!-- CART -->
            <form action="{{ route('cart.index') }}" method="GET">
                <button type="submit" class="btn btn-primary">View Cart</button>
            </form>

            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 m-3 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">Register</a>
                @endif
            @endauth

            <!-- ADMIN PANEL -->
            <a href="{{ route('admin.index') }}" class="bg-white m-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">
                ADMIN PANEL
            </a>

            <a href="{{ route('orders.order') }}" class="btn btn-primary">
                Переглянути замовлення
            </a>


            <!-- SEARCH -->

        </div>
    @endif --}}


    {{-- <div class="container mt-5">
        <h1>Products</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="product-images">
                                @foreach ($product->images as $image)
                                    <img src="{{ $image->ImageUrl }}" alt="{{ $product->name }}" class="img-fluid">
                                @endforeach

                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
    const scrollerInner = document.querySelector(".scroller-inner");
    const images = document.querySelectorAll(".scroller img");
    let index = 0; // Index for the current image
    const scrollDuration = 1500; // Time for each scroll (1.5 seconds)
    const delayTime = 5000; // 10 seconds delay between transitions

    // Function to move to the next image
    function moveToNextImage() {
        // Fade out the previous image
        images[index].classList.add("fade-out");

        // Move to the next image
        index = (index + 1) % images.length;  // Wrap around to the first image if at the end
        scrollerInner.style.transform = `translateX(-${index * 100}%)`; // Move images left

        // Remove the fade-out effect once the image is fully transitioned
        setTimeout(() => {
            images[index].classList.remove("fade-out");
        }, scrollDuration); // Wait for the animation duration

        // Wait for the duration of the animation + delay before triggering the next one
        setTimeout(moveToNextImage, scrollDuration + delayTime); // Wait after animation before starting next scroll
    }

    // Start the animation cycle
    moveToNextImage();
});
function toggleSubmenu(selectedCategory) {
    // Toggle the selected submenu
    const selectedSubmenu = selectedCategory.querySelector('.submenu');
    const selectedArrow = selectedCategory.querySelector('.arrow');

    if (selectedSubmenu.style.display === 'block') {
        selectedSubmenu.style.display = 'none';
        selectedArrow.innerHTML = '&#9654;'; // Change arrow to right
    } else {
        selectedSubmenu.style.display = 'block';
        selectedArrow.innerHTML = '&#9660;'; // Change arrow to down
    }
}
       </script>
@endsection

@section('scripts')

@endsection

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
    <div class="container_info">
        <h1>Terms of Cooperation with Vendella Demian</h1>
        <p>You can become our partner and earn as a dropshipper with an 8% commission on your orders and an additional 5% on orders from your direct referrals (team members). You can also build a team with us to increase your income beyond that of a dropshipper, or simply be our wholesale buyer and earn an 8% commission on all orders (excluding discounts and promotions), earning only on your personal sales.</p>
        <p>To become our distributor, you need to make an initial one-time wholesale order of $500. After we confirm your commitment to collaboration, you’ll be activated as a business partner, qualifying for partnership benefits: 8% on personal sales and 5% from team sales.</p>
        <p>Example Earnings:</p>
        <li>If your team makes $1,000 in sales in a week, you earn $50.</li>
        <li>Over a month, if your team’s sales reach $5,000, your monthly team commission is $250.</li>
        <li>Plus, if your personal sales volume is $3,000, you earn an additional $240 (8%), totaling $490 per month.</li>
        <p>Your Potential: By selling daily at $200, a reasonable target, you can reach $6,200 in monthly sales, earning an additional $496 without added effort.</p>
        <p>Pricing and Sales Flexibility: You may set your own prices. For example, you could purchase a bag from us at $150 and resell it for $220–$250. You’d earn our 8% discount plus a margin of $70–$100 per bag.</p>
        <p>Our exclusive products are hard to find, especially in Europe. You have the opportunity to build a business across the U.S. and Europe, earning in USD while living in your country. We’ll handle the product shipping for your customers.
            Payment Processing: Payments are made via PayPal manually. Once you have at least $100 in your account, request a payout via our Telegram channel. Our admin will review and issue the payment.</p>
            <p>Monthly Meetings and Updates: Each month, we hold an online meeting on Telegram with news about promotions, discounts, and training for social media sales. We also reward top sales leaders with bonuses and gifts.</p>
            <p>Getting Started:</p>
            <p>1. Register on our website and place your initial $500 order.</p>
            <p>2. Our manager will contact you via Telegram for payment and delivery.</p>
            <p>3. You’ll be added to our group chat on Telegram, where you can access product photos, videos, and stay updated on all events and news.</p>
            <img class="money_img" src="/images/money_img.png" alt="">
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
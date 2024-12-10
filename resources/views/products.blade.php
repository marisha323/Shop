<link rel="stylesheet" href="{{ asset('css/products.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('title', 'Products')
@extends('layouts.main_nav')
@section('content')
    {{-- <div class="search_products">
        <button class="btn_close" onclick="clearInput()">
            <img class="close_icon" src="/icons/close_icon.png" alt="">
        </button>
        <input class="search_inp" type="text" placeholder="Search" id="searchInput">
        <button class="btn_search">Search</button>
    </div> --}}


    <div class="product_body">
        <div class="bg_img">


            <div id="carouselExampleControls" class="carousel slide active" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('images/baner2.png') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/baner1.png') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/baner3.png') }}" alt="Third slide">
                    </div>
                     <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/baner4.png') }}" alt="Third slide">
                    </div>
                     <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/baner5.png') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/baner6.png') }}" alt="Third slide">
                    </div>

                </div>

            </div>


        </div>


        <div class="filters">
            <p>New Products</p>
            <div class="quick_filters">
                <a class="active" href="/">New Products</a>
                <a href="/">Over the last 7 days</a>
                <a href="/">Over the last 30 days</a>
            </div>
            <p>Filter by Categories</p>
            <select class="select_con" name="" id="">
                <option value="" selected disabled>Select</option> <!-- Default, unselectable option -->
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
                <option value="option4">Option 4</option>
                <option value="option5">Option 5</option>
            </select>
        </div>
        <div class="product_section">
            <div class="container_menu_scroller">
                <div class="menu">
                    <div class="option_m">
                        <a href="/" class="opt"><p>Women's Clothing</p> <img class="arrow" src="/icons/arrow_y.png"
                                                                             alt=""></a>
                        <hr>
                    </div>
                    <div class="option_m">
                        <a href="/" class="opt"><p>Men's Clothing</p> <img class="arrow" src="/icons/arrow_y.png"
                                                                           alt=""></a>
                        <hr>
                    </div>
                    <div class="option_m">
                        <a href="/" class="opt"><p>Accessories</p> <img class="arrow" src="/icons/arrow_y.png"
                                                                        alt=""></a>
                        <hr>
                    </div>
                    <div class="option_m">
                        <a href="/" class="opt"><p>Seasonal Collections</p> <img class="arrow" src="/icons/arrow_y.png"
                                                                                 alt=""></a>
                        <hr>
                    </div>
                    <div class="option_m">
                        <a href="/" class="opt"><p>Special Collections</p> <img class="arrow" src="/icons/arrow_y.png"
                                                                                alt=""></a>
                        <hr>
                    </div>
                    <div class="option_m">
                        <a href="/" class="opt"><p>Most Viewed</p> <img class="arrow" src="/icons/arrow_y.png"
                                                                        alt=""></a>
                        <hr>
                    </div>
                    <div class="option_m">
                        <a href="/" class="opt"><p>Most Viewed</p> <img class="arrow" src="/icons/arrow_y.png"
                                                                        alt=""></a>
                        <hr>
                    </div>
                    <div class="option_m">
                        <a href="/" class="opt"><p>Most Viewed</p> <img class="arrow" src="/icons/arrow_y.png"
                                                                        alt=""></a>
                        <hr>
                    </div>
                    <div class="option_m">
                        <a href="/" class="opt"><p>Most Viewed</p> <img class="arrow" src="/icons/arrow_y.png"
                                                                        alt=""></a>
                        <hr>
                    </div>
                    <div class="option_m">
                        <a href="/" class="opt"><p>Most Viewed</p> <img class="arrow" src="/icons/arrow_y.png"
                                                                        alt=""></a>
                        <hr>
                    </div>

                </div>
            </div>

            <div class="filters_selection_con">
                <div class="products">
                    @for ($i = 0; $i < 20; $i++)
                        <div class="product-card">
                            <div class="image-container">
                                <img src="/images/bag.png" alt="Product Image" class="product-image"/>
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

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script>
        function clearInput() {
            const searchInput = document.getElementById('searchInput');
            searchInput.value = ''; // Clear the input field
        }

        let currentSlideIndex = 0;

        function moveSlide(direction) {
            const slides = document.querySelectorAll('.slide');
            const totalSlides = slides.length;

            // Hide the current slide
            slides[currentSlideIndex].classList.remove('active');

            // Update the current slide index
            currentSlideIndex = (currentSlideIndex + direction + totalSlides) % totalSlides;

            // Show the new current slide
            slides[currentSlideIndex].classList.add('active');

            // Move the slider
            const slider = document.querySelector('.slider');
            slider.style.transform = `translateX(-${currentSlideIndex * 100}%)`;

            // Update dot indicators
            updateDots();
        }

        function currentSlide(index) {
            const slides = document.querySelectorAll('.slide');
            const totalSlides = slides.length;

            // Hide the current slide
            slides[currentSlideIndex].classList.remove('active');

            // Set the current slide index
            currentSlideIndex = index % totalSlides;

            // Show the new current slide
            slides[currentSlideIndex].classList.add('active');

            // Move the slider
            const slider = document.querySelector('.slider');
            slider.style.transform = `translateX(-${currentSlideIndex * 100}%)`;

            // Update dot indicators
            updateDots();
        }

        function updateDots() {
            const dots = document.querySelectorAll('.dot');
            dots.forEach((dot, index) => {
                dot.classList.remove('active');
                if (index === currentSlideIndex) {
                    dot.classList.add('active');
                }
            });
        }

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

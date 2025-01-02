<link rel="stylesheet" href="{{ asset('css/products.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <div class="links_category">
            <a class="link_home" href="/">Home</a>
            <p>/</p>
            <p class="title_category">{{ $category->title }}</p>
        </div>

        <div class="product_section">
            <div class="container_menu_scroller">
                <div class="menu">
                    @foreach($categories as $categorie)
                        <div class="option_m">
                            <a href="{{route('products.showCategory',$categorie->id)}}" class="opt">
                                <p>{{$categorie->title}}</p> <img class="arrow" src="/icons/arrow_y.png" alt=""></a>
                            <hr>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="filters_selection_con">
                @if($category->products->isEmpty())
                    <p class="category_no_product">There are no products in this category.</p>
                @else
                    <div class="products">
                        @foreach($products as $product)
                            <div class="product-card">
                                <a href="{{route('product.show',$product->id)}}" class="product-link">
                                    <div class="image-container">
                                        @foreach($product->images as $image)
                                            <img src="{{ $image->ImageUrl }}" alt="{{ $product->name }}"
                                                 class="product-image"/>
                                        @endforeach
                                        <div class="image-dots">
                                            @foreach($product->images as $index => $image)
                                                <span class="dot {{ $index === 0 ? 'active' : '' }}"></span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-name">{{ $product->name }}</h3>
                                        <p class="product-price">{{ $product->price }} $</p>
                                    </div>
                                </a>
                                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="add-to-cart">Add to cart</button>
                                </form>
                            </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="pagination pagination-links">
                        {{ $products->links() }}
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

        // function updateDots() {
        //     const dots = document.querySelectorAll('.dot');
        //     dots.forEach((dot, index) => {
        //         dot.classList.remove('active');
        //         if (index === currentSlideIndex) {
        //             dot.classList.add('active');
        //         }
        //     });
        // }

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

        document.querySelectorAll('.product-card').forEach(card => {
            const images = card.querySelectorAll('.product-image');
            const dots = card.querySelectorAll('.dot');

            if (images.length > 0) {
                images[0].classList.add('active'); // Додаємо клас до першого зображення
                dots[0].classList.add('active');   // Додаємо клас до першої точки
            }
        });

        document.querySelectorAll('.dot').forEach(dot => {
            dot.addEventListener('click', function (event) {
                event.preventDefault(); // Запобігаємо стандартній поведінці посилання
                event.stopPropagation(); // Зупиняємо спливання події

                const card = dot.closest('.product-card'); // Знаходимо батьківський елемент
                const images = card.querySelectorAll('.product-image'); // Отримуємо всі зображення
                const dots = card.querySelectorAll('.dot'); // Отримуємо всі точки

                const index = Array.from(dots).indexOf(dot); // Знаходимо індекс натиснутої точки

                // Знімаємо активні класи
                images.forEach(img => img.classList.remove('active'));
                dots.forEach(d => d.classList.remove('active'));

                // Додаємо активні класи до вибраного елемента
                images[index].classList.add('active');
                dots[index].classList.add('active');
            });
        });
    </script>
@endsection

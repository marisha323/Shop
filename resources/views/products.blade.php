<link rel="stylesheet" href="{{ asset('css/products.css') }}">

@section('title', 'Products')

<div class="search_products">
    <button class="btn_close" onclick="clearInput()">
        <img class="close_icon" src="/icons/close_icon.png" alt="">
    </button>
    <input class="search_inp" type="text" placeholder="Search" id="searchInput">
    <button class="btn_search">Search</button>
</div>

<div class="product_body">
    <p>Category > Product</p>
    <h2>Sneakers <span>(502)</span></h2>
    
    <div class="bg_img">
        <button class="slider-btn left" onclick="moveSlide(-1)">&#10094;</button>
    
        <div class="slider">
            <img class="slide product_img_slider active" src="https://content.rozetka.com.ua/banner_main/image/original/469965841.jpg" alt="Shoe Icon">
            <img class="slide product_img_slider" src="https://content1.rozetka.com.ua/banner_main/image/original/472751698.png" alt="Shoe Icon">
            <img class="slide product_img_slider" src="https://content2.rozetka.com.ua/banner_main/image/original/472751698.png" alt="Shoe Icon">
            <img class="slide product_img_slider" src="https://content1.rozetka.com.ua/banner_main/image/original/472751698.png" alt="Shoe Icon">
            <img class="slide product_img_slider" src="https://content2.rozetka.com.ua/banner_main/image/original/472751698.png" alt="Shoe Icon">
            <img class="slide product_img_slider" src="https://content1.rozetka.com.ua/banner_main/image/original/472751698.png" alt="Shoe Icon">
            <img class="slide product_img_slider" src="https://content2.rozetka.com.ua/banner_main/image/original/472751698.png" alt="Shoe Icon">
        </div>
        <button class="slider-btn right" onclick="moveSlide(1)">&#10095;</button>
    </div>
    
    <div class="indicator">
        <span class="dot active" onclick="currentSlide(0)"></span>
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
        <span class="dot" onclick="currentSlide(6)"></span>
    </div>
    
    <div class="product_section">
        <div class="categories_selection">
            <h3>Categories</h3>
            <div class="category" onclick="toggleSubmenu(this)">
                <div class="category-title">
                    <h3>Category 1</h3>
                    <span class="arrow">&#9660;</span> <!-- Arrow icon, initially down -->
                </div>
                <div class="submenu" style="display: block;"> <!-- Initially open -->
                    <div class="subcategory" onclick="event.stopPropagation()"> 
                        <h4>Subcategory 1.1</h4>
                    </div>
                    <div class="subcategory" onclick="event.stopPropagation()">
                        <h4>Subcategory 1.2</h4>
                    </div>
                    <div class="subcategory" onclick="event.stopPropagation()">
                        <h4>Subcategory 1.3</h4>
                    </div>
                </div>
            </div>
            <div class="category" onclick="toggleSubmenu(this)">
                <div class="category-title">
                    <h3>Category 2</h3>
                    <span class="arrow">&#9660;</span> <!-- Arrow icon, initially down -->
                </div>
                <div class="submenu" style="display: block;"> <!-- Initially open -->
                    <div class="subcategory" onclick="event.stopPropagation()">
                        <h4>Subcategory 2.1</h4>
                    </div>
                    <div class="subcategory" onclick="event.stopPropagation()">
                        <h4>Subcategory 2.2</h4>
                    </div>
                </div>
            </div>
            <div class="category" onclick="toggleSubmenu(this)">
                <div class="category-title">
                    <h3>Category 3</h3>
                    <span class="arrow">&#9660;</span> <!-- Arrow icon, initially down -->
                </div>
                <div class="submenu" style="display: block;"> <!-- Initially open -->
                    <div class="subcategory" onclick="event.stopPropagation()">
                        <h4>Subcategory 3.1</h4>
                    </div>
                    <div class="subcategory" onclick="event.stopPropagation()">
                        <h4>Subcategory 3.2</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="filters_selection_con">
            {{-- <div class="filters-container">
                <select class="filter" name="Size" id="size-select">
                    <option value="">Size</option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
                
                <select class="filter" name="Brand" id="brand-select">
                    <option value="">Brand</option>
                    <option value="brand1">Brand 1</option>
                    <option value="brand2">Brand 2</option>
                    <option value="brand3">Brand 3</option>
                </select>
                
                <select class="filter" name="Color" id="color-select">
                    <option value="">Color</option>
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                </select>
                
                <select class="filter" name="Price" id="price-select">
                    <option value="">Price Range</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
                
                <select class="filter last_f" name="sort_by" id="sort-select">
                    <option value="">Sort By: Most relevant</option>
                    <option value="relevant">Relevant</option>
                    <option value="newest">Newest</option>
                    <option value="price-low-to-high">Price: Low to High</option>
                    <option value="price-high-to-low">Price: High to Low</option>
                    <option value="rating">Rating</option>
                </select>
            </div> --}}
            
            <div class="products">
                <!-- Example product container -->
                @for ($i = 0; $i < 5; $i++)
                    <div class="product-container">
                        <div class="product">
                            <img class="product_img" src="/images/shoe_icon.png" alt="">
                            <div class="add_cart_btn_p">
                                <p class="price">$65.00 <span class="cut_price">$85.00</span></p>
                                <button class="add_cart_btn">Add Cart</button>
                            </div>
                            <p>Product Name (19201291)</p>
                            <p>Brand Name</p>
                            <div class="description_prod">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur nam odio, reiciendis vitae ex nisi atque ipsum unde, totam eveniet rerum a ipsa fugit? Aperiam necessitatibus placeat facere consectetur aliquid.</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>

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

<link rel="stylesheet" href="{{ asset('css/products.css') }}">

@section('title', 'Products')

<div class="search_products">
    <button class="btn_close">
        <img class="close_icon" src="/icons/close_icon.png" alt="">
    </button>
    <input class="search_inp" type="text" placeholder="Search">
    <button class="btn_search">
        Search
    </button>
</div>
<div class="product_body">
    <p>Category > Product</p>
    <h2>Sneakers <span>(502)</span></h2>
    <div class="bg_img">
        <h1>Sneakers</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae orci vehicula, sodales dui non, eleifend sem. Praesent ac ultrices sapien. Nullam sollicitudin velit id libero dictum, non vestibulum odio aliquet, sodales dui non, eleifend sem. Praesent ac ultrices sapien. Nullam sollicitudin velit id libero dictum, non vestibulum odio aliquet.</p>
    </div>
    <div class="product_section">
        <div class="categories_selection">
            <h3>Categories</h3>
            <div class="category">
                <img class="category_img" src="/images/shoe_icon.png" alt="">
                <h3>Category 1 (43)</h3>
            </div>
            <div class="category">
                <img class="category_img" src="/images/shoe_icon.png" alt="">
                <h3>Category 1 (43)</h3>
            </div>
            <div class="category">
                <img class="category_img" src="/images/shoe_icon.png" alt="">
                <h3>Category 1 (43)</h3>
            </div>
            <div class="category">
                <img class="category_img" src="/images/shoe_icon.png" alt="">
                <h3>Category 1 (43)</h3>
            </div>
        </div>
        <div class="filters_selection_con">
            <div class="filters-container">
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
            </div>
            <div class="products">
                <div class="product">
                    <img class="product_img" src="/images/shoe_icon.png" alt="">
                    <p>Brand</p>
                    <h2>Product Name</h2>
                    <p class="price">$65 <span class="cut_price">$85</span></p>
                </div>
                <div class="product">
                    <img class="product_img" src="/images/shoe_icon.png" alt="">
                    <p>Brand</p>
                    <h2>Product Name</h2>
                    <p class="price">$65 <span class="cut_price">$85</span></p>
                </div>
                <div class="product">
                    <img class="product_img" src="/images/shoe_icon.png" alt="">
                    <p>Brand</p>
                    <h2>Product Name</h2>
                    <p class="price">$65 <span class="cut_price">$85</span></p>
                </div>
                <div class="product">
                    <img class="product_img" src="/images/shoe_icon.png" alt="">
                    <p>Brand</p>
                    <h2>Product Name</h2>
                    <p class="price">$65 <span class="cut_price">$85</span></p>
                </div>
                <div class="product">
                    <img class="product_img" src="/images/shoe_icon.png" alt="">
                    <p>Brand</p>
                    <h2>Product Name</h2>
                    <p class="price">$65 <span class="cut_price">$85</span></p>
                </div>
                <div class="product">
                    <img class="product_img" src="/images/shoe_icon.png" alt="">
                    <p>Brand</p>
                    <h2>Product Name</h2>
                    <p class="price">$65 <span class="cut_price">85$</span></p>
                </div>
            </div>
        </div>
        
    </div>
</div>

@section('scripts')
    <!-- Add additional scripts here if needed -->
@endsection
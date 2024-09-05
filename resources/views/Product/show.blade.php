<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap">

<h1 class="name_p">VENDELLA DEMIAN</h1>
<div class="container">
    <div class="path">
        <a href="/home">Home</a>
        <a href="/bestsellers">Bestsellers</a>
        <a href="/sneaker">Item</a>
    </div>
    <div class="prod_display">
        <div class="images_container">
            <img src="/images/shoe_icon.png" alt="">
            <img src="/images/shoe_icon.png" alt="">
            <img src="/images/shoe_icon.png" alt="">
            <img src="/images/shoe_icon.png" alt="">
        </div>
        <div class="image_display">
            <img src="/images/shoe_icon.png" alt="">
        </div>
        <div class="information">
            <h1>Item</h1>
            <h3>{{ $itemName }}</h3>
            <h2 class="price_cut">$65.00 <span>$85.00</span></h2>
            <hr>
            <h3 class="c_option">Color: <span id="selectedColor">{{ $selectedColor }}</span></h3>

            <!-- Form to handle color selection -->
            <form id="colorForm" method="POST" action="{{ route('product.updateColor', ['itemName' => $itemName]) }}">
                @csrf
                <div class="color-options">
                    <label class="color-radio">
                        <input type="radio" name="color" value="Black" {{ ($selectedColor ?? 'Black') == 'Black' ? 'checked' : '' }}>
                        <span class="color-swatch-wrapper">
                            <span class="color-swatch black"></span>
                        </span>
                    </label>
                    <label class="color-radio">
                        <input type="radio" name="color" value="Red" {{ ($selectedColor ?? 'Black') == 'Red' ? 'checked' : '' }}>
                        <span class="color-swatch-wrapper">
                            <span class="color-swatch red"></span>
                        </span>
                    </label>
                    <label class="color-radio">
                        <input type="radio" name="color" value="Blue" {{ ($selectedColor ?? 'Black') == 'Blue' ? 'checked' : '' }}>
                        <span class="color-swatch-wrapper">
                            <span class="color-swatch blue"></span>
                        </span>
                    </label>
                </div>
            </form>
            <h3>Size:</h3>
            <div class="sizes">
                <div class="size">XXS</div>
                <div class="size">XS</div>
                <div class="size">S</div>
                <div class="size">M</div>
                <div class="size">L</div>
                <div class="size">XL</div>
            </div>
            <a class="size_guide" href="">Size Guide</a>
            
            <div class="buttons">
                <div class="quantity-control">
                    <button class="quantity-btn minus">−</button>
                    <input type="number" value="1" class="quantity-input">
                    <button class="quantity-btn plus">+</button>
                </div>
                <button class="add-to-cart">Add To Cart</button>
            </div>
            <div class="descriptio">
                <h2 class="d_s_p"><img class="p_icon" src="/icons/pencil_icon.png" alt="">Description</h2>
                <p class="ds">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dictum, odio id suscipit posuere, dolor lorem lacinia tortor, vel consequat odio sem non ligula. Integer ut venenatis nunc. Nulla ac turpis malesuada, dignissim lectus vel, aliquet turpis. Aliquam erat volutpat. In aliquet eros a ligula tincidunt, sed cursus lectus pretium.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Add JavaScript to update the selected color when a radio button is clicked -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Color selection logic
        const colorRadios = document.querySelectorAll('input[name="color"]');
        const selectedColorSpan = document.getElementById('selectedColor');

        colorRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const selectedColor = this.value;
                selectedColorSpan.textContent = selectedColor;

                // Optionally, you could trigger a form submission or other actions here
            });
        });

        // Quantity control logic
        const quantityInput = document.querySelector('.quantity-input');
        const minusButton = document.querySelector('.quantity-btn.minus');
        const plusButton = document.querySelector('.quantity-btn.plus');

        // Update quantity
        function updateQuantity(amount) {
            const currentValue = parseInt(quantityInput.value, 10);
            const newValue = Math.max(1, currentValue + amount); // Ensure minimum value is 1
            quantityInput.value = newValue;
        }

        // Add event listeners to buttons
        minusButton.addEventListener('click', function() {
            updateQuantity(-1);
        });

        plusButton.addEventListener('click', function() {
            updateQuantity(1);
        });
    });
</script>
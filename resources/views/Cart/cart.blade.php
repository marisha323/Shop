<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <title>Cart Page</title>
</head>
<body>
    <div class="cart-container">
        <h1 class="cart-title">Shopping Cart</h1>
        <div class="cart-items">
            <div class="cart-item">
                <img src="https://spanx.com/cdn/shop/files/blackcrew.png?v=1725571700&width=1000" alt="Item 1" class="item-image">
                <div class="item-details">
                    <div class="n_p_container">
                        <h1>Name of the product</h1>
                        <div class="price_container">
                            <h1 class="price">$20.00 <span class="cut_price">$30.00</span></h1>
                        </div>  
                    </div>
                    <button class="remove-item">Remove</button>
                    <div class="quantity-controls">
                        <button class="quantity-button" onclick="changeQuantity(this, -1)">-</button>
                        <input type="number" class="item-quantity" value="1" min="1" max="99" maxlength="2" oninput="limitInputLength(this)" />
                        <button class="quantity-button" onclick="changeQuantity(this, 1)">+</button>
                    </div>
                </div>
                
            </div>
            
        </div>
        <div class="cart-summary">
            <h2 class="summary-title">Cart Summary</h2>
            <div class="summary-item">
                <span class="summary-label">Subtotal:</span>
                <span class="summary-value">$49.98</span> <!-- Update this based on total -->
            </div>
            <div class="summary-item">
                <span class="summary-label">Shipping:</span>
                <span class="summary-value">Free</span>
            </div>
            <div class="summary-item total">
                <span class="summary-label">Total:</span>
                <span class="summary-value">$49.98</span> <!-- Update this based on total -->
            </div>
            <button class="checkout-button">Proceed to Checkout</button>
        </div>
    </div>
</body>
<script>
    function changeQuantity(button, change) {
        const quantityInput = button.parentElement.querySelector('.item-quantity');
        let currentQuantity = parseInt(quantityInput.value);

        // Change quantity based on button clicked
        if (change === -1 && currentQuantity > 1) {
            currentQuantity -= 1; // Decrease quantity, ensuring it doesn’t go below 1
        } else if (change === 1 && currentQuantity < 99) {
            currentQuantity += 1; // Increase quantity, ensuring it doesn’t exceed 99
        }

        quantityInput.value = currentQuantity; // Update the input value
    }

    function limitInputLength(input) {
        // Convert input value to string and check its length
        if (input.value.length > 2) {
            input.value = input.value.slice(0, 2); // Limit to two digits
        }
    }
</script>
</html>
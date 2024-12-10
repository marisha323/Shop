<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@section('title', 'Cart')
@extends('layouts.main_nav')


@section('content')
<div class="cart_container">
    <h1>Your Cart</h1>

    <div class="display_list_info">
        <div class="emp_d"><p>Added Items:</p></div>
        <p>Price</p>
        <p>Quantity</p>
        <p>Total Price</p>
    <div></div>
    </div>
    <hr>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhMHaunvYk8q_hmXVtd1eO39lg36ucOqyUm3HvqyrqUDRRglTkVVXvBvmg2mUOPheN6nQ&usqp=CAU" alt="Product Name" class="product-image">
        <div class="product-info">
            <div class="name_des">
                <h2>Product Name</h2>
                <p>Style: Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <p class="product-price unit-price">$10.00</p>
            <div class="quantity-control">
                <button class="decrease">-</button>
                <span class="quantity">1</span>
                <button class="increase">+</button>
            </div>
            <p class="product-price total-price">$10.00</p>
            <button class="remove-product">X</button>
        </div>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhMHaunvYk8q_hmXVtd1eO39lg36ucOqyUm3HvqyrqUDRRglTkVVXvBvmg2mUOPheN6nQ&usqp=CAU" alt="Product Name" class="product-image">
        <div class="product-info">
            <div class="name_des">
                <h2>Product Name</h2>
                <p>Style: Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <p class="product-price unit-price">$10.00</p>
            <div class="quantity-control">
                <button class="decrease">-</button>
                <span class="quantity">1</span>
                <button class="increase">+</button>
            </div>
            <p class="product-price total-price">$10.00</p>
            <button class="remove-product">X</button>
        </div>
    </div>

    <hr>
    <div class="subtotal">
        <p><strong>Subtotal:</strong> <span id="subtotal-price">$20.00</span></p>
    </div>

    <button class="checkout">PROCEED TO CHECKOUT</button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const quantityControls = document.querySelectorAll('.quantity-control');
        let subtotal = 0; // Initialize subtotal

        quantityControls.forEach(control => {
            const decreaseButton = control.querySelector('.decrease');
            const increaseButton = control.querySelector('.increase');
            const quantityDisplay = control.querySelector('.quantity');
            const unitPriceElement = control.closest('.product-info').querySelector('.unit-price');
            const totalPriceDisplay = control.closest('.product-info').querySelector('.total-price');
            const subtotalDisplay = document.getElementById('subtotal-price');

            function updateTotalPrice(quantity) {
                const unitPrice = parseFloat(unitPriceElement.textContent.replace('$', '')); // Get unit price
                const totalPrice = (unitPrice * quantity).toFixed(2); // Calculate total price
                totalPriceDisplay.textContent = `$${totalPrice}`; // Update total price display
                return totalPrice; // Return total price for subtotal calculation
            }

            function updateSubtotal() {
                subtotal = 0; // Reset subtotal
                document.querySelectorAll('.product').forEach(product => {
                    const quantity = parseInt(product.querySelector('.quantity').textContent);
                    const unitPrice = parseFloat(product.querySelector('.unit-price').textContent.replace('$', ''));
                    subtotal += unitPrice * quantity; // Add to subtotal
                });
                subtotalDisplay.textContent = `$${subtotal.toFixed(2)}`; // Update subtotal display
            }

            decreaseButton.addEventListener('click', () => {
                let currentQuantity = parseInt(quantityDisplay.textContent);
                if (currentQuantity > 1) { // Ensure quantity doesn't go below 1
                    currentQuantity--;
                    quantityDisplay.textContent = currentQuantity;
                    updateTotalPrice(currentQuantity); // Update total price
                    updateSubtotal(); // Update subtotal
                }
            });

            increaseButton.addEventListener('click', () => {
                let currentQuantity = parseInt(quantityDisplay.textContent);
                currentQuantity++;
                quantityDisplay.textContent = currentQuantity;
                updateTotalPrice(currentQuantity); // Update total price
                updateSubtotal(); // Update subtotal
            });

            // Initialize total price and subtotal on page load
            updateTotalPrice(parseInt(quantityDisplay.textContent));
            updateSubtotal();
        });
    });
</script>
@endsection

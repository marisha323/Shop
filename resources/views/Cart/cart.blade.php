<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@section('title', 'Cart')
@extends('layouts.main_nav')

<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="cart_container">
    @if(session('cart'))
    <h1>Your Cart</h1>

    <div class="display_list_info">
        <div class="emp_d"><p>Added Items:</p></div>
        <p>Color</p>
        <p>Price</p>
        <p>Quantity</p>
        <p>Total Price</p>
    <div></div>
    </div>
    <hr>

    @foreach(session('cart') as $id=> $details)
    <div class="product" data-id="{{ $id }}">
        @if(!empty($details['images']))
        <img src="{{$details['images'][0]['ImageUrl']}}" alt="{{$details['name']}}" class="product-image">
        @endif
        <div class="product-info">
            <div class="name_des">
                <h2>{{$details['name']}}</h2>

            </div>
            <div class="color_des">
                <button class="color_button" style="background-color: {{$details['color']}}"></button>
            </div>
            <p class="product-price unit-price">${{$details['price']}}</p>
            <div class="quantity-control">
                <button class="decrease">-</button>
                <span class="quantity">{{$details['quantity'] }}</span>
                <button class="increase">+</button>
            </div>
            <p class="product-price total-price">${{ $details['price'] * $details['quantity'] }}</p>
            <form action="{{ route('cart.remove', $id) }}" method="POST">
                @csrf
                @method('DELETE')
            <button class="remove-product">X</button>
            </form>
        </div>
    </div>
    @endforeach
    <hr>
    <div class="subtotal">
        <p><strong>Subtotal:</strong> <span id="subtotal-price">${{$total}}</span></p>
    </div>
        <a href="{{ route('order.order') }}">
    <button class="checkout">PROCEED TO CHECKOUT</button>
        </a>
    @else
        <p>Your cart is empty.</p>
    @endif
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

            // decreaseButton.addEventListener('click', () => {
            //     let currentQuantity = parseInt(quantityDisplay.textContent);
            //     if (currentQuantity > 1) { // Ensure quantity doesn't go below 1
            //         currentQuantity--;
            //         quantityDisplay.textContent = currentQuantity;
            //         updateTotalPrice(currentQuantity); // Update total price
            //         updateSubtotal(); // Update subtotal
            //     }
            // });

            // increaseButton.addEventListener('click', () => {
            //     let currentQuantity = parseInt(quantityDisplay.textContent);
            //     currentQuantity++;
            //     quantityDisplay.textContent = currentQuantity;
            //     updateTotalPrice(currentQuantity); // Update total price
            //     updateSubtotal(); // Update subtotal
            // });

            // Initialize total price and subtotal on page load
            updateTotalPrice(parseInt(quantityDisplay.textContent));
            updateSubtotal();
        });
    });



    // update session quantity product

    document.querySelectorAll('.quantity-control button').forEach(button=>{
        button.addEventListener('click',function (){
            const product =this.closest('.product');
            const quantitySpan=product.querySelector('.quantity');
            const totalPriceElement=product.querySelector('.total-price');
            const unitPrice=parseFloat(product.querySelector('.unit-price').textContent.replace('$',''));
            const productId=product.dataset.id;
            let newQuantity=parseInt(quantitySpan.textContent);

            if(this.classList.contains('increase')){
                newQuantity++;
            } else if (this.classList.contains('decrease')&& newQuantity>1){
                newQuantity--;
            }
            quantitySpan.textContent=newQuantity;
            totalPriceElement.textContent=`$${(unitPrice*newQuantity.toFixed(1))}`;

            fetch(`/cart/update/${productId}`,{
                method:'PATCH',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body:JSON.stringify({quantity:newQuantity}),
            })
                .then(response=>response.json())
                .then(data=>{
                if (data.success){
                    document.getElementById('subtotal-price').textContent=`$${data.total.toFixed(2)}`;
                }
                })
                .catch(error=>console.error('Error',error));
        });
    });

</script>
@endsection

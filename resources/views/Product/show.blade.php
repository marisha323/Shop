<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap">
@extends('layouts.main_nav')

@section('title', 'Vendella Demian')

@section('styles')
    <!-- Add additional styles here if needed -->
@endsection
@section('content')
    <div class="container">

        <div class="prod_display">
            <div class="images_container">
                @foreach ($productImages as $key => $productImage)

                    <img src="{{ $productImage->image->ImageUrl }}" alt="Product Image" onclick="updateDisplay(this)">
                @endforeach

            </div>

            <div class="image_display">
                <button id="left-arrow"></button>
                <img id="main-display" src="{{ $mainImageUrl }}" alt="Main Product Image">
                <button id="right-arrow"></button>
            </div>
            <div class="information">

                <h1 class="prod_name">{{ $product->name }}</h1>
                <hr>
{{--                <h1 class="price">$50.00 <span>$75.00</span></h1>--}}
                <h1 class="price">${{ $product->price }}</h1>
                <hr>
                <p class="storage_q">In storage: {{ $product->count }}</p>
                <p class="p_s">Select Size</p>
                <div class="radio_btns">
                    <label class="radio_enabled active_r">
                        <input type="radio" name="size" value="36">
                        <span class="r_num">{{ $product->characteristics->size->name }}</span>
                    </label>
                    <label class="radio_enabled">
                        <input type="radio" name="size" value="38">
                        <span class="r_num">38</span>
                    </label>
                    <label class="radio_enabled">
                        <input type="radio" name="size" value="40">
                        <span class="r_num">40</span>
                    </label>
                    <label class="radio_enabled">
                        <input type="radio" name="size" value="42">
                        <span class="r_num">42</span>
                    </label>
                    <label class="radio_disabled">
                        <input type="radio" name="size" value="44" disabled>
                        <span class="r_num">44 (Disabled)</span>
                    </label>
                    <label class="radio_enabled">
                        <input type="radio" name="size" value="46">
                        <span class="r_num">46</span>
                    </label>
                </div>

                <div class="color_btns">
                    <label class="radio_enabled active_r">
                        <input type="radio" name="size" value="36">
                        <span class="r_num">{{ $product->characteristics->size->name }}</span>
                    </label>

                    <label class="radio_enabled">
                        <input type="radio" name="size" value="38">
                        <span class="r_num">38</span>
                    </label>
                    <label class="radio_enabled">
                        <input type="radio" name="size" value="40">
                        <span class="r_num">40</span>
                    </label>
                    <label class="radio_enabled">
                        <input type="radio" name="size" value="42">
                        <span class="r_num">42</span>
                    </label>
                    <label class="radio_disabled">
                        <input type="radio" name="size" value="44" disabled>
                        <span class="r_num">44 (Disabled)</span>
                    </label>
                    <label class="radio_enabled">
                        <input type="radio" name="size" value="46">
                        <span class="r_num">46</span>
                    </label>
                </div>

                <hr>
                <h1 class="q_h">Quantity:</h1>
                <div class="add_to_cart">
                    <div class="add_Q">
                        <button class="decrease">-</button>
{{--                        <input type="number" class="quantity" value="1" min="1" max="99" oninput="limitInput(this)"/>--}}
                        <button class="increase">+</button>

                    </div>
                    <button class="add_cart">ADD TO CART</button>
                </div>
                <h1 class="des_h1">Description</h1>



                fgdfg
                <p class="description">
                    {{ $product->description }}
                </p>
                <hr>
                <div class="character_con">
                    <h1 class="char_h1">Characters</h1>
                    <ul>
                        <li>Material type : {{ $product->characteristics->type_of_material }}</li>
                        <li>Height : {{ $product->characteristics->height }}</li>
                        <li>Width : {{ $product->characteristics->width }}</li>
                        <li>Brand :  {{ $product->characteristics->brand->name }}</li>

                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Add JavaScript to update the selected color when a radio button is clicked -->
    <script>
        const images = document.querySelectorAll('.images_container img');
        const mainDisplay = document.getElementById('main-display');

        // Track the currently selected image index
        let currentIndex = 0;

        // Initialize by setting the first image to be selected
        images[currentIndex].style.border = '2px solid black'; // Initial selected image

        // Function to update the main display and highlight the selected image
        function updateMainDisplay(index) {
            // Update the main display image
            mainDisplay.src = images[index].src;

            // Loop through images and reset their border color
            images.forEach((img, i) => {
                img.style.border = i === index ? '2px solid black' : '2px solid gray';
            });
        }

        // Event listeners for the left and right buttons
        document.getElementById('left-arrow').addEventListener('click', () => {
            // Move to the previous image, looping around if necessary
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateMainDisplay(currentIndex);
        });

        document.getElementById('right-arrow').addEventListener('click', () => {
            // Move to the next image, looping around if necessary
            currentIndex = (currentIndex + 1) % images.length;
            updateMainDisplay(currentIndex);
        });

        function updateDisplay(selectedImage) {
            // Get the index of the selected image
            currentIndex = Array.from(images).indexOf(selectedImage); // Update currentIndex

            // Update the main display image source with the clicked image source
            mainDisplay.src = selectedImage.src;

            // Loop through all images to update borders
            images.forEach(image => {
                if (image === selectedImage) {
                    image.style.border = '2px solid black'; // Set border for selected image
                } else {
                    image.style.border = '2px solid gray'; // Set border for unselected images
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Select all the radio button labels
            const radioLabels = document.querySelectorAll('.radio_btns label');

            radioLabels.forEach(label => {
                label.addEventListener('click', function () {
                    // Remove active class from all labels
                    radioLabels.forEach(lbl => lbl.classList.remove('active_r'));

                    // Add active class to the clicked label
                    this.classList.add('active_r');
                });
            });
        });

        function limitInput(input) {
            // Ensure the input value is a number and within the allowed range
            if (input.value > 99) {
                input.value = 99; // Set to max value if it exceeds 99
            }

            // Restrict to maximum 2 digits
            if (input.value.length > 2) {
                input.value = input.value.slice(0, 2); // Limit to 2 digits
            }
        }

        // Increase and Decrease button functionality
        document.querySelector('.increase').addEventListener('click', function () {
            const quantityInput = document.querySelector('.quantity');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue < 99) {
                quantityInput.value = currentValue + 1;
            }
        });

        document.querySelector('.decrease').addEventListener('click', function () {
            const quantityInput = document.querySelector('.quantity');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

    </script>
@endsection

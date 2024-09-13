<!-- resources/views/order.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
</head>
<body>
    <div class="order-container">
        <!-- Left side: Address Information and Payment Information -->
        <div class="address-info">
            <h2>Shipping Address</h2>
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" required placeholder="John Doe">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required placeholder="123 Main St">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" required placeholder="Springfield">
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" id="postal_code" name="postal_code" required placeholder="12345">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" required placeholder="USA">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number" required placeholder="(555) 123-4567 (Optional)">
                </div>
            
                <!-- Payment Information Section -->
                <div class="payment-info">
                    <h2>Payment Information</h2>
                    <div class="form-group">
                        <label for="card_number">Card Number</label>
                        <input type="text" id="card_number" name="card_number" required placeholder="1234 5678 9012 3456" maxlength="19">
                    </div>
                    <div class="form-group">
                        <label for="card_expiry">Expiry Date</label>
                        <input type="text" id="card_expiry" name="card_expiry" placeholder="MM/YY" required maxlength="5">
                    </div>
                    <div class="form-group">
                        <label for="card_cvc">CVC</label>
                        <input type="text" id="card_cvc" name="card_cvc" required placeholder="123">
                    </div>
                    <div class="checkbox-container">
                        <label for="same_as_shipping">Use shipping address as billing address</label>
                        <input type="checkbox" id="same_as_shipping" name="same_as_shipping" checked>
                    </div>
            
                    <!-- Billing Address Section -->
                    <div id="billing_address_section" class="billing-address-section">
                        <h3>Billing Address</h3>
                        <div class="form-group">
                            <label for="billing_full_name">Full Name</label>
                            <input type="text" id="billing_full_name" name="billing_full_name" placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="billing_address">Address</label>
                            <input type="text" id="billing_address" name="billing_address" placeholder="123 Main St">
                        </div>
                        <div class="form-group">
                            <label for="billing_city">City</label>
                            <input type="text" id="billing_city" name="billing_city" placeholder="Springfield">
                        </div>
                        <div class="form-group">
                            <label for="billing_postal_code">Postal Code</label>
                            <input type="text" id="billing_postal_code" name="billing_postal_code" placeholder="12345">
                        </div>
                        <div class="form-group">
                            <label for="billing_country">Country</label>
                            <input type="text" id="billing_country" name="billing_country" placeholder="USA">
                        </div>
                        <div class="form-group">
                            <label for="billing_phone_number">Phone Number</label>
                            <input type="text" id="billing_phone_number" name="billing_phone_number" placeholder="(555) 123-4567 (Optional)">
                        </div>
                    </div>
                </div>
            
                <button type="submit" class="submit-button" id="placeOrderButton">Place Order</button>

            </form>
        </div>

        <!-- Right side: Product Information -->
        <div class="product-info">
            <h2>Order Summary</h2>
            
            <!-- Product List -->
            <div class="product-list">
                <div class="product-item">
                    <img src="https://t3.ftcdn.net/jpg/06/12/00/18/360_F_612001823_TkzT0xmIgagoDCyQ0yuJYEGu8j6VNVYT.jpg" alt="Product Image" class="product-image">
                    <div class="product-details">
                        <p class="product-name">Awesome Product</p>
                        <p class="product-price">$50</p>
                        <p class="product-quantity"><strong>Qty:</strong> 2</p>
                    </div>
                </div>
                <div class="product-item">
                    <img src="https://t3.ftcdn.net/jpg/06/12/00/18/360_F_612001823_TkzT0xmIgagoDCyQ0yuJYEGu8j6VNVYT.jpg" alt="Product Image" class="product-image">
                    <div class="product-details">
                        <p class="product-name">Awesome Product</p>
                        <p class="product-price">$50</p>
                        <p class="product-quantity"><strong>Qty:</strong> 2</p>
                    </div>
                </div>
                <div class="product-item">
                    <img src="https://t3.ftcdn.net/jpg/06/12/00/18/360_F_612001823_TkzT0xmIgagoDCyQ0yuJYEGu8j6VNVYT.jpg" alt="Product Image" class="product-image">
                    <div class="product-details">
                        <p class="product-name">Awesome Product</p>
                        <p class="product-price">$50</p>
                        <p class="product-quantity"><strong>Qty:</strong> 2</p>
                    </div>
                </div>
                <div class="product-item">
                    <img src="https://t3.ftcdn.net/jpg/06/12/00/18/360_F_612001823_TkzT0xmIgagoDCyQ0yuJYEGu8j6VNVYT.jpg" alt="Product Image" class="product-image">
                    <div class="product-details">
                        <p class="product-name">Awesome Product</p>
                        <p class="product-price">$50</p>
                        <p class="product-quantity"><strong>Qty:</strong> 2</p>
                    </div>
                </div>
                
                <!-- Add more product-item divs as needed -->

                <!-- Divider -->
                <hr>

                <!-- Summary -->
                <div class="summary">
                    <p><strong>Total Price:</strong> $100</p>
                </div>
            </div>
        </div>
    </div>
    <div id="blurOverlay" class="blur-overlay"></div>

<!-- Modal -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <div class="loading-animation">Loading</div>
        <div class="confirmation-message" style="display: none;">Thank you for your purchase! &#10003;</div>
        <button id="continueButton" style="display: none;">Continue</button>
    </div>
</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cardNumberInput = document.getElementById('card_number');

        function formatCardNumber(value) {
            // Remove non-digit characters
            value = value.replace(/\D/g, '');

            // Format with spaces every 4 digits
            value = value.replace(/(\d{4})(?=\d)/g, '$1 ');

            return value;
        }

        cardNumberInput.addEventListener('input', function() {
            let value = cardNumberInput.value;
            cardNumberInput.value = formatCardNumber(value);
        });
    });
    //CARD EXPIRATION WRITING LOGIC!
    //------------------------------------------------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        const cardExpiryInput = document.getElementById('card_expiry');

        function formatExpiry(value) {
            // Remove non-digit characters
            value = value.replace(/\D/g, '');

            // Limit to 4 digits
            if (value.length > 4) {
                value = value.slice(0, 4);
            }

            // Format as MM/YY
            if (value.length >= 2) {
                value = value.slice(0, 2) + '/' + value.slice(2);
            }

            return value;
        }

        function isValidExpiry(value) {
            // Remove non-digit characters
            value = value.replace(/\D/g, '');

            // Check if length is exactly 4
            if (value.length !== 4) {
                return false;
            }

            const month = parseInt(value.slice(0, 2), 10);
            const year = parseInt(value.slice(2, 4), 10);

            // Check if month is between 01 and 12
            if (month < 1 || month > 12) {
                return false;
            }

            return true;
        }

        function handleKeyDown(event) {
            const cursorPos = cardExpiryInput.selectionStart;
            let value = cardExpiryInput.value;

            if (event.key === 'Backspace') {
                setTimeout(() => {
                    if (cursorPos > 0) {
                        if (value[cursorPos - 1] === '/') {
                            value = value.slice(0, cursorPos - 1) + value.slice(cursorPos);
                            cardExpiryInput.value = formatExpiry(value);
                            cardExpiryInput.selectionStart = cardExpiryInput.selectionEnd = cursorPos - 1;
                        } else {
                            cardExpiryInput.value = formatExpiry(value.slice(0, cursorPos - 1) + value.slice(cursorPos));
                            cardExpiryInput.selectionStart = cardExpiryInput.selectionEnd = cursorPos - 1;
                        }
                    }
                }, 0);
            } else if (event.key === 'Delete') {
                setTimeout(() => {
                    if (value[cursorPos] === '/') {
                        value = value.slice(0, cursorPos) + value.slice(cursorPos + 1);
                        cardExpiryInput.value = formatExpiry(value);
                        cardExpiryInput.selectionStart = cardExpiryInput.selectionEnd = cursorPos;
                    } else {
                        cardExpiryInput.value = formatExpiry(value);
                        cardExpiryInput.selectionStart = cardExpiryInput.selectionEnd = cursorPos;
                    }
                }, 0);
            }
        }

        cardExpiryInput.addEventListener('input', function() {
            let value = cardExpiryInput.value;
            cardExpiryInput.value = formatExpiry(value);
            
            // Check validity
            if (!isValidExpiry(cardExpiryInput.value.replace(/\D/g, ''))) {
                cardExpiryInput.setCustomValidity('Please enter a valid expiry date.');
            } else {
                cardExpiryInput.setCustomValidity('');
            }
        });

        cardExpiryInput.addEventListener('keydown', handleKeyDown);
    });
    

    //CHECK MARK LOGIC FOR BILLING
document.addEventListener('DOMContentLoaded', function() {
    const sameAsShippingCheckbox = document.getElementById('same_as_shipping');
    const billingAddressSection = document.getElementById('billing_address_section');

    function toggleBillingAddress() {
        if (sameAsShippingCheckbox.checked) {
            billingAddressSection.style.display = 'none';
        } else {
            billingAddressSection.style.display = 'block';
        }
    }

    sameAsShippingCheckbox.addEventListener('change', toggleBillingAddress);
    toggleBillingAddress();
});





//PREVENT THE FORM FROM SUBMITTING WHEN CLICKING PLACE ORDER
//----------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('orderForm');
    const placeOrderButton = document.getElementById('placeOrderButton');

    function showConfirmation(event) {
        event.preventDefault(); // Prevent the form from submitting

        const inputs = form.querySelectorAll('input[required]');
        let firstInvalidField = null;

        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.style.border = '2px solid red'; // Highlight invalid fields
                if (!firstInvalidField) {
                    firstInvalidField = input; // Store the first invalid field
                }
            } else {
                input.style.border = ''; // Remove border for valid fields
            }
        });

        if (firstInvalidField) {
            firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstInvalidField.focus();
            return; // Exit function if there's an invalid field
        }

        // If no invalid fields, proceed with showing the confirmation
        const blurOverlay = document.getElementById('blurOverlay');
        blurOverlay.style.display = 'block';

        const modal = document.getElementById('confirmationModal');
        modal.style.display = 'block';

        const loadingAnimation = modal.querySelector('.loading-animation');
        const confirmationMessage = modal.querySelector('.confirmation-message');
        const continueButton = document.getElementById('continueButton');

        loadingAnimation.style.display = 'block';
        confirmationMessage.style.display = 'none';
        continueButton.style.display = 'none';

        setTimeout(function() {
            loadingAnimation.style.display = 'none';
            confirmationMessage.style.display = 'block';
            continueButton.style.display = 'block';
        }, 3000);

        continueButton.addEventListener('click', function() {
            window.location.href = '/tracking-page';
        });
    }

    form.addEventListener('submit', showConfirmation);
});




//ANIMATION
//----------------------------------------------------------------------
function showConfirmation(event) {
    event.preventDefault(); // Prevent the form from submitting

    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input[required]');
    let firstInvalidField = null;

    inputs.forEach(input => {
        if (!input.checkValidity()) {
            input.style.border = '2px solid red'; // Highlight invalid fields
            if (!firstInvalidField) {
                firstInvalidField = input; // Store the first invalid field
            }
        } else {
            input.style.border = ''; // Remove border for valid fields
        }
    });

    if (firstInvalidField) {
        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
        firstInvalidField.focus();
        return; // Exit function if there's an invalid field
    }

    // If no invalid fields, proceed with showing the confirmation
    const blurOverlay = document.getElementById('blurOverlay');
    blurOverlay.style.display = 'block';

    const modal = document.getElementById('confirmationModal');
    modal.style.display = 'block';

    const loadingAnimation = modal.querySelector('.loading-animation');
    const confirmationMessage = modal.querySelector('.confirmation-message');
    const continueButton = document.getElementById('continueButton');

    loadingAnimation.style.display = 'block';
    confirmationMessage.style.display = 'none';
    continueButton.style.display = 'none';

    setTimeout(function() {
        loadingAnimation.style.display = 'none';
        confirmationMessage.style.display = 'block';
        continueButton.style.display = 'block';
    }, 3000);

    continueButton.addEventListener('click', function() {
        window.location.href = '/tracking-page';
    });
}

document.getElementById('placeOrderButton').addEventListener('click', showConfirmation);
</script>
</html>
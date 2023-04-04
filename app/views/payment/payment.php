<?php
include __DIR__ . '/../header.php';
?>
<div class="payment-body">
    <div class="cal-body">
        <?php
        include '/app/views/components/Calendar.php';
        ?>
    </div>


    <div class="container">
        <div class="row">
            <form id="payment-form" method="POST" action="/payment/processPayment">
                <div class="col-md-8 order-md-7">
                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="ideal" name="paymentMethod" type="radio" class="custom-control-input"
                                value="ideal" checked required>
                            <label class="custom-control-label" for="ideal">iDEAL</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input"
                                value="creditcard" required>
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                value="debitcard" required>
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                    </div>

                    <div id="payment-details"></div>

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </div>
            </form>
        </div>
    </div>



    <script>
        window.onload = addToCalender;
        // Get the payment form and payment details container
        const paymentForm = document.getElementById("payment-form");
        const paymentDetails = document.getElementById("payment-details");

        // Get the radio buttons
        const idealRadio = document.getElementById("ideal");
        const creditCardRadio = document.getElementById("credit");
        const debitCardRadio = document.getElementById("debit");

        fetch('http://localhost/api/payment' {
            method: 'GET'
        })
            .then(response => response.json())
            .then(data => {
                const issuers = data.issuers;
                const bankSelect = document.getElementById('bank');

                // Add options to the select element for each issuer
                issuers.forEach(issuer => {
                    const option = document.createElement('option');
                    option.value = issuer.id;
                    option.text = issuer.name;
                    bankSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error retrieving iDEAL issuers:', error);
            });

        // Create the payment form fields for each payment method
        const idealFields = `
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="bank">Bank</label>
            <select class="custom-select d-block w-100" id="bank" required>
                
            </select>
            <div class="invalid-feedback">
                Please select a valid bank.
            </div>
        </div>
    </div>
`;

        const creditCardFields = `
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
                Name on card is required
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
                Credit card number is required
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="MM/YY" required>
                <div class="invalid-feedback">
                    Expiration date is required
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                    Security code is required
                </div>
            </div>
        </div>
`;

        const debitCardFields = `
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
                Name on card is required
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="cc-number">Debit card number</label>
            <input type="text" class="form-control" id="debit-number" placeholder="" required>
            <div class="invalid-feedback">
                Debit card number is required
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-3 mb-3">
                <label for="dc-expiration">Expiration</label>
                <input type="text" class="form-control" id="dc-expiration" placeholder="MM/YY" required>
                <div class="invalid-feedback">
                    Expiration date is required
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="dc-cvv">CVV</label>
                <input type="text" class="form-control" id="dc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                    Security code is required
                </div>
            </div>
        </div>
    </div>
`;

        // Function to update the payment details container based on the selected radio button
        function updatePaymentDetails() {
            // Clear the payment details container
            paymentDetails.innerHTML = "";

            // Determine which radio button is selected
            if (idealRadio.checked) {
                paymentDetails.innerHTML = idealFields;
            } else if (creditCardRadio.checked) {
                paymentDetails.innerHTML = creditCardFields;
            } else if (debitCardRadio.checked) {
                paymentDetails.innerHTML = debitCardFields;
            }
        }

        // Call the updatePaymentDetails function on page load and whenever a radio button is clicked
        updatePaymentDetails();
        idealRadio.addEventListener("click", updatePaymentDetails);
        creditCardRadio.addEventListener("click", updatePaymentDetails);
        debitCardRadio.addEventListener("click", updatePaymentDetails);

    </script>
    <?php
    include __DIR__ . '/../footer.php';
    ?>
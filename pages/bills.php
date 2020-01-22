<?php

include("header.php");
?>
<title>Bills</title>



<h1>Bill Payment</h1>

<label>Amount</label>
<input type="number" id="paymentAmount" min="0.01" step="0.01" max="25000000" value="0.00" />


<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
// Configure environment -- later
        env: 'sandbox',
        client: {
            sandbox: 'demo_sandbox_client_id',
            production: 'demo_production_client_id'
        },
// Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'large',
            color: 'gold',
            shape: 'pill',
        },
// Set up a payment
        payment: function (data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: document.getElementById("paymentAmount").value,
                        currency: 'USD'
                    }
                }]
            });
        },
// Execute the payment
        onAuthorize: function (data, actions) {
            return actions.payment.execute()
                .then(function () {
// Show a confirmation message to the buyer
                    window.alert('Thank you for your purchase!');
                });
        }
    }, '#paypal-button');
</script>

<?php
include("footer.php");
?>
@extends('layouts.appold')

@section('content')

<div>

    <h2>Billing Details</h2>
        <div class="checkout-section">
         <form action="{{ route('checkout.store') }}" method="post" id="payment-form">
         {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="" >


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="" >
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="" >
            </div>

            <div class="half-form">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="" >
                </div>
                <div class="form-group">
                    <label for="county">County (optional)</label>
                    <input type="text" class="form-control" id="county" name="county" value="">
                </div>

        </div> <!-- end half-form -->

        <div class="half-form">
            <div class="form-group">
                <label for="postalcode">Postal Code</label>
                <input type="text" class="form-control" id="postalcode" name="postalcode" value="" >
            </div>
        <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="">
            </div>
        </div> <!-- end half-form -->

    <h2>Payment Details</h2>

        <div class="form-group">
                <label for="name_on_card">Name on Card</label>
                <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
        </div>

        <div class="form-group">
                <label for="card-element">
                    Credit or debit card
                </label>
        <div id="card-element">
        <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
        </div>

        <div class="spacer"></div>
                <button type="submit" id="complete-order" class="btn btn-success btn-lg">Complete Order</button>

            </form>
        </div>

            <div class="checkout-table-container">
                <h2>Your Order</h2>
                <div class="checkout-table">
        <?php $yourtotal=0; ?>

        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="{{ asset('image/' .$details['imagename']) }}" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{ $details['name'] }}</div>
                                <div class="checkout-table-price">Price: £{{ $details['price'] }}</div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{ $details['quantity'] }}</div>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    <?php $yourtotal = $yourtotal + $details['quantity'] * $details['price']; ?>
            @endforeach
        @endif

                </div> <!-- end checkout-table -->

                    <div class="checkout-totals-right">
                        <span class="checkout-totals-total">Total: £{{ $yourtotal }}</span>

                    </div>
                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>

        <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('pk_test_51Ikcm5A72szxMj3cTcaLTeEGH5mJ49L9tmeHcweMnyStgElYBpKZN4OFQjFyK303yYuQOTv8Q8i15LQUmfOH1RRf00lcoEUWwX');

            // Create an instance of Elements
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete-order').disabled = true;

              var options = {
                  name: document.getElementById('name_on_card').value,
                  address_line1: document.getElementById('address').value,
                  address_city: document.getElementById('city').value,
                  address_state: document.getElementById('county').value,
                  address_zip: document.getElementById('postalcode').value
              }

              stripe.createToken(card,options).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;

                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });

            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);

              // Submit the form
              form.submit();
            }

        })();
    </script>

@endsection

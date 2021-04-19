@extends('layouts.appold')
@section('content') 

<h2>Billing Details</h2>

     <form action="" method="POST" id="">
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="" required>
        

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="" required>
        </div>

        <div class="half-form">
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="" required>
            </div>
            <div class="form-group">
                <label for="county">County (optional)</label>
                <input type="text" class="form-control" id="county" name="county" value="">
            </div>
      
    </div> <!-- end half-form -->

        <div class="half-form">
            <div class="form-group">
                <label for="postalcode">Postal Code</label>
                <input type="text" class="form-control" id="postalcode" name="postalcode" value="" required>
            </div>
        <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="" required>
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

@endsection


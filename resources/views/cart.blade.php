@extends('layouts.appold')
@section('content') 

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th></th>
                <th></th>
           </tr>
        </thead>
    </table>
     
            
    <h3>You have no items in your shopping cart</h3>
    <a href="{{ url('/product') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
@endsection

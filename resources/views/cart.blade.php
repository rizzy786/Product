@extends('layouts.appold')
@section('content')
@can('view-cart')

    <table id="cart" class="table">
        <thead>
            <tr>
                <th style="width:20%">Product</th>
                <th style="width:20%"></th>
                <th style="width:10%"></th>
                <th style="width:15%">Price</th>
                <th style="width:15%">Quantity</th>
                <th style="width:15%">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $yourtotal=0; ?>
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                  <tr>
                   <td>
                      <div class="row">
                        <div class="col-sm-3"><img src="{{ asset('image/' .$details['imagename']) }}" width="150"/></div>
                      </div>
                   </td>
                    <td>{{ $details['name'] }}</td>

                    <td>
                        <button value="{{ $id }}" class = "btn btn-danger btn-sm delete-item">Remove</button>
                    </td>
                    <td>£{{ $details['price'] }}</td>
                    <td>
                        <input type="number" min=1 onchange="quantityChange({{ $id }}, this.value)" class="form-control" id="quantity" value="{{ $details['quantity'] }}">
                    </td>
                    <td>£{{ $details['quantity'] * $details['price']}}</td>
                  </tr>
                  <?php $yourtotal = $yourtotal + $details['quantity'] * $details['price']; ?>
                @endforeach
            @endif
                 <tr class="border-bottom">
                            <td></td>
                            <td style="padding: 40px;"></td>
                            <td></td>
                            <td></td>
                            <td><b>Your Total</b></td>
                            <td>£{{ $yourtotal }}</td>
                 </tr>
            </tbody>
    </table>

    <a href="{{ url('/product') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
    <a href="{{ url('/checkout') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>

@endcan
@endsection

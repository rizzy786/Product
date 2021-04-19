@extends('layouts.appold')
@section('content') 

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
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
              <tr>
               <td>
                  <div class="row">
                    <div class="col-sm-3"><img src="{{ asset('image/' .$details['imagename']) }}" width="130"/></div>
                  </div>
                </td>
                <td>
                  {{ $details['name'] }}
                </td>
               
                <td> 
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                </td>
                <td>
                    £{{ $details['price'] }}
                </td>
                <td>
                    <input type="number" min=1 onchange="quantityChange({{ $id }}, this.value)" class="form-control" id="quantity" value="{{ $details['quantity'] }}">
                </td>     
                <td>£{{ $details['quantity'] * $details['price']}}</td>
              </tr>
            @endforeach
        @endif
             <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 40px;"></td>
                        <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                        <td class="table-bg"></td>
                        <td class="column-spacer"></td>
                        
             </tr>
        </tbody>
    </table>
    
    <a href="{{ url('/product') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
    <a href="{{ url('/checkout') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>

@endsection

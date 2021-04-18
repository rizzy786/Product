@extends('layouts.appold')
@section('content') 

    <table id="cart" class="table">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
              <tr>
                <td>
                  {{ $details['name'] }}
                  <div class="row">
                    <div class="col-sm-3"><img src="{{ asset('image/' .$details['imagename']) }}" width="100"/></div>
                  </div>
                </td>
                <td>£{{ $details['price'] }}</td>
                <td>
                <input type="number" min=1 onchange="quantityChange({{ $id }}, this.value)" class="form-control" id="quantity" value="{{ $details['quantity'] }}">
                </td>     
                <td>£{{ $details['quantity'] * $details['price']}}</td>
              </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection

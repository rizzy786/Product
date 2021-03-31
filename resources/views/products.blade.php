@extends('layouts.appold')
@section('content') 

    @if(Route::current()->getName()=='product-index' || Route::current()->getName()=='product-show')
    @forelse ($products as $product)
      @include ('products.template', ['products'=>$products])
    @empty
    <p>There are no products to display</p>
    @endforelse
    @else
      @foreach ($products as $product)
        @include ('products.template-edit', ['products'=>$products])
      @endforeach
    @endif
            @can('add-product')
            @if(Route::current()->getName()=='product-index')
            <div class = "wrapper">
                    <label for = "product">Product Type:</label>
                     <select id = "producttype" name = "product">
                       <option value = "1">Book</option>
                       <option value = "2">CD</option>
                     </select>

                     <input type = "text" class = "title" id = "title" placeholder = "Product Name" name = "title">
                     <input type = "text" class = "price" id = "price" placeholder = "Price" name = "price">
                    <button class = "add-product">ADD</button>
                    
            </div>
            @endif
            @endcan

@endsection

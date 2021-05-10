@extends('layouts.appold')
@section('content') 

    @can('add-product')
            @if(Route::current()->getName()=='product-index')
            <div class = "wrapper">
                <h4>Add new Product</h4><br>
                    <label for = "product">Product Type:</label>
                     <select id = "producttype" name = "product">
                       <option value = "1">Phone</option>
                       <option value = "2">Laptop</option>
                       <option value = "3">Desktop</option>
                     </select>

                     <input type = "text" class = "title" id = "title" placeholder = "Product Name" name = "title">
                     <input type = "text" class = "screen_size" id = "screen_size" placeholder = "Screen Size" name = "screen_size">
                     <input type = "text" class = "processor" id = "processor" placeholder = "Processor" name = "processor">
                     <input type = "text" class = "storage" id = "storage" placeholder = "Storage" name = "storage">
                     <input type = "text" class = "price" id = "price" placeholder = "Price" name = "price">
                     
                    <button class = "add-product">ADD</button>
                    
            </div>
            @endif
    @endcan

    
        @if(Route::current()->getName()=='product-index' || Route::current()->getName()=='product-show')
            @forelse ($products as $product)
                @include ('products.show', ['products'=>$products])
                @empty
                <p>There are no products to display</p>
            @endforelse
          @else
            @foreach ($products as $product)
                @include ('products.show-edit', ['products'=>$products])
            @endforeach
        @endif
                 
@endsection

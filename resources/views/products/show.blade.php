<body>

    <div>
        <div class = "item">
             <p class = "type"><b>{{$product->productType->type}}</b></p>
             <img src = "{{ asset('image/' . $product->imagename) }}" height="160px"/>
             <p><b>{{ $product->product_name}}</b></p>
             <p>{{ $product->product_screen_size}}</p>
             <p>{{ $product->product_processor}}</p>
             <p>{{ $product->product_storage}}</p>
             <p><b>£{{ $product->price}}</b></p>

                @if(Route::current()->getName()=='product-index')
                        <button value="{{$product->id}}" class = "btn btn-primary btn select-product">SELECT</button>
                        @can('delete-product')
                        <button value="{{$product->id}}" class = "btn btn-primary btn delete-product">DELETE</button>
                        @endcan
                @endif

                @if(Route::current()->getName()=='product-show')
                    @can('purchase-product', $product)
                        <button value="{{$product->id}}" class = "btn btn-primary btn purchase-product">ADD TO CART</button>
                    @endcan
                    @can('edit-product')
                        <button value="{{$product->id}}" class = "btn btn-primary btn edit-product">EDIT</button>
                    @endcan
                @endif
        </div>
    </div>

</body>

<body>

<div class = "container">
    <div class = "item">
         <p class = "type">{{$product->productType->type}}</p>
         <img src = "no_image.png" width = 75% />
         <p><b>{{ $product->product_name}}</b></p>
         <p>£{{ $product->price/100}}</p>    
        <div>
            @if(Route::current()->getName()=='product-index')
                    <button value="{{$product->id}}" class = "select-product">SELECT</button>
                    @can('delete-product')
                    <button value="{{$product->id}}" class = "delete-product">DELETE</button>
                    @endcan
            @endif
                    
            @if(Route::current()->getName()=='product-show')
                @can('purchase-product', $product)
                    <button value="{{$product->id}}" class = "purchase-product">PURCHASE</button>    
                @endcan  
                @can('edit-product')
                    <button value="{{$product->id}}" class = "edit-product">EDIT</button>
                @endcan
            @endif
    </div>
</div>
</body>

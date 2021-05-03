<body>
<div class = "item">
    <p class = "type"><b>{{$product->productType->type}}</b></p>
    <img src = "{{ asset('image/' . $product->imagename) }}" height="150px"/>
    
    <div class = "form-group">
        <input id="file" type="file" class="form-control"/>
    </div>
    <input type = "text" class = "title" id = "title" name = "title" value = "{{ $product->product_name }}" style="font-weight: bold">
    <input type = "text" class = "screen_size" id = "screen_size" name = "screen_size" value = "{{ $product->product_screen_size}}">
    <input type = "text" class = "title" id = "processor" name = "processor" value = "{{ $product->product_processor}}">
    <input type = "text" class = "title" id = "storage" name = "storage" value = "{{ $product->product_storage}}">
    <input type = "text" class = "price" id = "price" name = "price" value = "£{{ $product->price}}">
    <button value = "{{$product->id}}" class = "update-product">Upload</button>
</div>
</body>
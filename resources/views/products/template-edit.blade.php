<body>
<div class = "item">
    <p class = "type">{{$product->productType->type}}</p>
    <img src = "no_image.png" width = 75% />
    
    <div class = "form-group">
        <label for = "file">File</label>
        <input id="file" type="file" class="form-control"/>
    </div>
    <input type = "text" class = "title" id = "title" name = "title" value = "{{ $product->product_name }}">
    <input type = "text" class = "screen_size" id = "screen_size" name = "screen_size" value = "{{ $product->product_screen_size}}>
    <input type = "text" class = "title" id = "processor" name = "processor" value = "{{ $product->product_processor}}">
    <input type = "text" class = "title" id = "storage" name = "storage" value = "{{ $product->product_storage}}">
    <input type = "text" class = "price" id = "price" name = "price" value = "{{ $product->price/100 }}">
    <button value = "{{$product->id}}" class = "update-product">Upload</button>
</div>
</body>
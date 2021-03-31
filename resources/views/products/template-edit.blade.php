<body>
<div class = "item">
    <p class = "type">{{$product->productType->type}}</p>
    <img src = "no_image.png" width = 75% />
    
    <div class = "form-group">
        <label for = "file">File</label>
        <input id="file" type="file" class="form-control"/>
    </div>
    <input type = "text" class = "title" id = "title" name = "title"value = "{{ $product->product_name }}">
    <input type = "text" class = "price" id = "price" name = "price" value = "{{ $product->price/100 }}">
    <button value = "{{$product->id}}" class = "update-product">Upload</button>
</div>
</body>
window.onload = function() {
    document.addEventListener('click', e => {
        if (e.target.matches('button.select-product')) {
            getProductByID(e.target.value);
        }
        if (e.target.matches('button.update-product')) {
            updateProductByID(e.target.value);
        }
        if (e.target.matches('button.delete-product')) {
            deleteProductByID(e.target.value);
        }
        if (e.target.matches('button.add-product')) {
            addNewProduct();
        }
        if (e.target.matches('button.edit-product')){
            editProductByID(e.target.value);
        }
        if (e.target.matches('button.home')){
            window.location= "/home";
        }
        if (e.target.matches('button.product')){
            window.location= "/product";
        }

        if (e.target.matches('button.cart')){
            window.location= "/cart";
        }

        if (e.target.matches('button.purchase-product')){
            addToCart(e.target.value);
        }
        if (e.target.matches('button.delete-item')){
            deleteFromCart(e.target.value);
    }

    });
}

async function addToCart(id) {
    try{
        const response = await axios.get('/add-to-cart/' + id, {id:id});

//        if(response.data.msg==='success'){
           alert("Product Added to Cart");
//            window.location="/product/" +id;
//        }
//        else alert ("Error Purchasing Product");
        }
        catch (error){
            console.error(error);
        }
    }

 async function deleteFromCart(id){
      try{
        const response = await axios.delete('/cart/'+id, {id:id});
//        if(response.data.msg==='success') {
//            console.log("success");
            window.location= "/cart";
//        }
//        else console.error("some error");
    }
    catch (error) {
        console.error(error);
    }
}

function  getProductByID(id) {
    window.location= "/product/" + id;
}

function editProductByID(id){
    window.location= "/product/" + id + "/edit";
}

async function quantityChange(id, value){
       const response = await axios.post('/editcart', {productid:id, quantity:value});
            window.location= "/cart";
}

async function updateProductByID(id) {
    var imagename = document.getElementById('imagename').files[0].name;
    var producttype = document.getElementById('producttype').value;
    var title = document.getElementById('title').value;
    var screen_size = document.getElementById('screen_size').value;
    var processor = document.getElementById('processor').value;
    var storage = document.getElementById('storage').value;
    var price = document.getElementById('price').value;


    try{
        const response = await axios.put('/product/'+id,
            {imagename:imagename, producttype:producttype, title:title, screen_size:screen_size, processor:processor, storage:storage, price:price});
//        if(response.data.msg==='success') {
//            console.log("success");
            window.location= "/product";
//        }
//        else console.error("some error");
    }
    catch (error) {
       console.log(error);
    }
}

async function deleteProductByID(id) {
    try{
        const response = await axios.delete('/product/'+id);
//        if(response.data.msg==='success') {
//            console.log("success");
            window.location= "/product";
//        }
//        else console.error("some error");
    }
    catch (error) {
        console.error(error);
    }
}

async function addNewProduct() {
    var imagename = document.getElementById('imagename').files[0].name;
    var producttype =  document.getElementById('producttype').value;
    var title = document.getElementById('title').value;
    var screen_size = document.getElementById('screen_size').value;
    var processor = document.getElementById('processor').value;
    var storage = document.getElementById('storage').value;
    var price = document.getElementById('price').value;

    if(!title ) title = " ";
    if(!price) price = 0;

    try{
        const response = await axios.post('/product/create',
            {imagename:imagename, producttype:producttype, title:title, screen_size:screen_size, processor:processor, storage:storage,  price:price}

        );
//        if(response.data.msg==='success') {
//            console.log("success");
            location.reload();
//        }
//        else console.error("some error");
    }
    catch (error) {
        console.error(error);
    }
}

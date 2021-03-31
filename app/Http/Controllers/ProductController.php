<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        
    $products = Product::all();
        return view('products', ['products' => $products]);
    }
    
    public function show($id){
        $product = Product :: find($id);
        $products = [$product];
        return view('products', ['products' => $products]);
    }   
    
    public function edit($id){
        $product = Product::find($id);
        $products = [$product]; //using products.blade which expects an array
        return view('products', ['products' => $products, 'edit'=> true]);
    }
    
    public function destroy($id){
        $product = Product::find($id)->delete();
    }

    public function store(Request $request){
      $producttype = $request->get('producttype');
      $title = $request->get('title');
      $price = $request->get('price');

	  $product = new Product;
      $product->product_type_id = $producttype;
   	  $product->product_name = $title;
   	  $product->price = $price;
   	  $product->save();
    }
}

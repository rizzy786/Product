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

    public function update(Request $request, $id){
        $product = Product::find($id);

        $product->imagename = $request->get('imagename');
       	$product->product_name = $request->get('title');
       	$product->product_screen_size= $request->get('screen_size');
       	$product->product_processor = $request->get('processor');
       	$product->product_storage = $request->get('storage');
        $product->price = $request->get('price');

      $product->save();
    }


    public function destroy($id){
        $product = Product::find($id)->delete();
    }

    public function store(Request $request){

      $imagename = $request->get('imagename');
      $producttype = $request->get('producttype');
      $title = $request->get('title');
      $screen_size = $request->get('screen_size');
      $processor = $request->get('processor');
      $storage = $request->get('storage');
      $price = $request->get('price');

	  $product = new Product;

      $product->imagename = $imagename;
	  $product->product_type_id = $producttype;
   	  $product->product_name = $title;
   	  $product->product_screen_size= $screen_size;
   	  $product->product_processor = $processor;
   	  $product->product_storage = $storage;
   	  $product->price = $price;
   	  $product->save();


    }
    public function search (Request $request){
        return view('search-results');
    }





}

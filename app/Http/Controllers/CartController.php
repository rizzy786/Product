<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(){
        return view('cart');
    }
    
    
    public function editCart(Request $request){
      $value = $request->get('quantity');
      $id = $request->get('productid');
      $cart = session()->get('cart');
        $product = Product::find($id);

            $cart[$id] = [
            "name" => $product->product_name,
            "quantity" => $value,
            "price" => $product->price,
            "imagename" => $product->imagename
        ];
      session()->put('cart', $cart);
    }
        
    public function addToCart($id){
        $product = Product::find($id);
        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "imagename" => $product->imagename
                ]
            ];

            session()->put('cart', $cart);
        } else {
            $cart[$id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->price,
            "imagename" => $product->imagename
        ];

        session()->put('cart', $cart);            
        }
    }
}

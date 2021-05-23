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

                if ($value == "" || $value <= 0 || strpos( $value, "." ))
                {
                    $value = $cart[$id]["quantity"];
                }

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
            if (array_key_exists($id, $cart)) {
                $total = $cart[$id]["quantity"];
            } else {
                $total = 0;
            }
            $cart[$id] = [
            "name" => $product->product_name,
            "quantity" => $total+1,
            "price" => $product->price,
            "imagename" => $product->imagename
            ];
            session()->put('cart', $cart);
        }
    }

   public function destroy($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart',$cart);
    }
}

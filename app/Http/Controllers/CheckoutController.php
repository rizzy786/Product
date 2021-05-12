<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index(){

        return view('checkout');
    }

    public function store(Request $request){
        try {
            $amount = 0;
            if (session('cart')){
                foreach (session('cart') as $id => $details) {
                    $amount = $amount + $details['price'];
                }
            }

            $amount = $amount * 100;

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = \Stripe\charge::create(array(
                'amount' => $amount,
                'currency' => 'GBP',
                'source' => $request->stripeToken,
                'description' => 'Order'
            ));
            session()->remove('cart');

            return back()->with('success_message', 'Thank you! Your payment has been successful');
        }catch(Exception $e){

        }


    }

}

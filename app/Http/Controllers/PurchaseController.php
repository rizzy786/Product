<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illumincate\Support\Facades\Gate;

class PurchaseController extends Controller{
    
    public function store (Product $product){
        
        /*
        if(Gate::denies('purchase-product', $product)) {
            return response()->json(["msg"=>"error"]); //allows for custom response
        }
        */
        return response()->json(["msg"=>"success"]);
        
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
        protected $fillable = [
        'product_type_id',
        'product_name',
        'product_screen_size',
        'product_processor',
        'product_storage',
        'price',
        'imagename'
        ];

    public function productType()
    {
        return $this -> belongsTo('App\Models\ProductType', 'product_type_id');
    }

    public function outOfStock()
    {
        return false;
    }    

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['product_type_id' => '1', 'product_name' => 'Neuromancer', 'price' => 399],
            ['product_type_id' => '1', 'product_name' => 'Snowcrash', 'price' => 599],
            ['product_type_id' => '2', 'product_name' => 'Seeking Thrills', 'price' => 799],
            ['product_type_id' => '2', 'product_name' => 'Modern World', 'price' => 599],
        ];
        
        foreach($products as $product){
            Product::create([
                'product_type_id' => $product['product_type_id'],
                'product_name' => $product['product_name'],
                'price' => $product['price'],
                ]);
        }
    }
}

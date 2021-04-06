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
            ['product_type_id' => '1', 'product_name' => 'iPhone 12 Pro', 'product_screen_size' => '6.7" Super Retina XDR Display', 'product_processor' => 'A14 Bionic Hexa-Core', 'product_storage' => '128 GB', 'price' => 399],
            ['product_type_id' => '1', 'product_name' => 'Samsung s21', 'product_screen_size' => '6.2" Full HD Touchscreen', 'product_processor' => '2.2 GHz Octa-Core', 'product_storage' => '128 GB', 'price' => 599],
            ['product_type_id' => '2', 'product_name' => 'Macbook Pro', 'product_screen_size' => '13.3" HD Retina Display', 'product_processor' => 'Intel Core i7 8th Gen', 'product_storage' => '1 TB', 'price' => 799],
            ['product_type_id' => '2', 'product_name' => 'Ultra Book', 'product_screen_size' => '15" HD Display', 'product_processor' => 'Intel Core i5 6th Gen', 'product_storage' => '500 GB', 'price' => 599],
            ['product_type_id' => '3', 'product_name' => 'HP Pavillion', 'product_screen_size' => '27.5" 4K Display', 'product_processor' => 'Intel Core i5', 'product_storage' => '2 TB', 'price' => 599],
        ];
        
        foreach($products as $product){
            Product::create([
                'product_type_id' => $product['product_type_id'],
                'product_name' => $product['product_name'],
                'product_screen_size' => $product['product_screen_size'],
                'product_processor' => $product['product_processor'],
                'product_storage' => $product['product_storage'],
                'price' => $product['price'],
                ]);
        }
    }
}

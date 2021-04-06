<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producttypes = [
            'Phone',
            'Laptop',
            'Desktop',
        ];
        
        foreach($producttypes as $producttype) {
            ProductType::create([
                'type' => $producttype,
                ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Apple', 'price' => 50.00, 'stock' => 100],
            ['name' => 'Banana', 'price' => 20.00, 'stock' => 200],
            ['name' => 'Orange', 'price' => 30.00, 'stock' => 150],
            ['name' => 'Mango', 'price' => 40.00, 'stock' => 120],
            ['name' => 'Peach', 'price' => 35.00, 'stock' => 180],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

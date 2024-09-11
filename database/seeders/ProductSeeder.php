<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Camera',
                'description' => "This is camera!",
                'price' => 10000,
            ],
            [
                'name' => 'Shoe',
                'description' => "This is shoe!",
                'price' => 10000,
            ],
            [
                'name' => 'Shirt',
                'description' => "This is shirt!",
                'price' => 10000,
            ],
            [
                'name' => 'Bag',
                'description' => "This is bag!",
                'price' => 10000,
            ],
            [
                'name' => 'Running Shoes',
                'description' => "This is running shoes!",
                'price' => 10000,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

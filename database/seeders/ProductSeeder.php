<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_1 = Product::create([
            'name' => 'MacBook Pro 13.3 Retina [MYD82] M1 Chip 256 GB - Space Gray',
            'image' => 'macbook.jpg',
            'price' => 217000.55,
            'price_sale' => 200000.55,
            'category_id' => 1,
            'stock'=> 2,
        ]);

        $product_2 = Product::create([
            'name' => 'HP Pavilion 15-cs0015nr',
            'image' => 'hp.jpg',
            'price' => 150000.55,
            'price_sale' => 140000.55,
            'category_id' => 3,
            'stock'=> 5,
        ]);
    }
}

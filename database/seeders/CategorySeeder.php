<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'brand_id' => 1,
            'name' => "MackBook Pro",
        ]);

        Category::create([
            'brand_id' => 1,
            'name' => "Iphone",
        ]);

        Category::create([
            'brand_id' => 2,
            'name' => "Notebook",
        ]);

        Category::create([
            'brand_id' => 2,
            'name' => "Impresora",
        ]);

        Category::create([
            'brand_id' => 3,
            'name' => "Notebook Pro",
        ]);
    }
}

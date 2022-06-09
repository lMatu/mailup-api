<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand_1 = Brand::create([
            'name' => 'Apple'
        ]);

        $brand_2 = Brand::create([
            'name' => 'HP'
        ]);

        $brand_3 = Brand::create([
            'name' => 'Lenovo'
        ]);
    }
}

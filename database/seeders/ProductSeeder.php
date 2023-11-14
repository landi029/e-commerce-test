<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Status;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
                'name' => 'T-Shirt',
                'description' => 'Woman T-Shirt',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/0/03/Woman_in_a_V-Neck_T-Shirt.jpg',
                'status_id' => Status::LIVE,
            ]);

        foreach (['S', 'M', 'L'] as $key => $variantName) {
            ProductVariant::create([
                'name' => $variantName,
                'product_id' => $product->id,
                'sku' => 'SKU-'.rand(5, 15),
                'stock' => rand(1, 5),
                'colour' => collect(['red', 'blue', 'pink', 'black', 'white'])->random(),
                'price' => 19.99 + $key
            ]);
        }
    }
}

<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        factory(Product::class, 20)->create();

        $products = Product::select('id')->get();
        foreach ($products as $product)
        {
            $product->addMediaFromUrl('https://lorempixel.com/640/480/?99481') ->toMediaCollection('products');
        }
    }
}

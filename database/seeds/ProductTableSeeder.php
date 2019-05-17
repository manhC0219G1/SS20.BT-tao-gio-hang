<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product();
        $product->id =1;
        $product->name="Fanta";
        $product->description = "Nước cam";
        $product->price = "15000";
        $product->price_old = "14000";
        $product->image = "anh";
        $product->save();

        $product = new \App\Product();
        $product->id =2;
        $product->name="Coca";
        $product->description = "Nước có ga";
        $product->price = "12000";
        $product->price_old = "10000";
        $product->image = "anh";
        $product->save();

    }
}

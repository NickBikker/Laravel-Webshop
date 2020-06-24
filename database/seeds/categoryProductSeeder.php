<?php

use Illuminate\Database\Seeder;

class categoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\categoryProduct([
            'category_id' => 1,
            'product_id' => 4
        ]);
        $product->save();
        $product = new \App\categoryProduct([
            'category_id' => 2,
            'product_id' => 2
        ]);
        $product->save();
        $product = new \App\categoryProduct([
            'category_id' => 4,
            'product_id' => 3
        ]);
        $product->save();
    }
}

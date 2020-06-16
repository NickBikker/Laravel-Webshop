<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(productseeder::class);

        $this->call(categoryseeder::class);

      /*    factory(App\Category::class, 10)->create()->each(function ($p) {
        	$p->products()->save(factory(App\Product::class)->make());
        	$p->products()->save(factory(App\Product::class)->make());
        	$p->products()->save(factory(App\Product::class)->make());
        	$p->products()->save(factory(App\Product::class)->make());
    	});  */
    }
    

}
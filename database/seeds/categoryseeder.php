<?php

use Illuminate\Database\Seeder;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category([
            'categoryname' => 'dieren',
        ]);
        $category->save();
        $category = new \App\Category([
            'categoryname' => 'boeken',
        ]);
        $category->save();
        $category = new \App\Category([
            'categoryname' => 'autos',
        ]);
        $category->save();
        $category = new \App\Category([
            'categoryname' => 'computers',
        ]);
        $category->save();
        $category = new \App\Category([
            'categoryname' => 'keuken',
        ]);
        $category->save();
    
    }
}





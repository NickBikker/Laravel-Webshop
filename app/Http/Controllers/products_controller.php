<?php

namespace App\Http\Controllers;

use App\producten;
use Illuminate\Http\Request;

class products_controller extends Controller
{
    public function getProducts(){
        $products = producten::all();

        return view('webshop.index', ['products' => $products]);

    }
}

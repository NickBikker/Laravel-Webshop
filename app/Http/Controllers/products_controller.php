<?php

namespace App\Http\Controllers;

use App\producten;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class products_controller extends Controller
{
    public function getProducts(){
        $products = producten::all();

        return view('webshop.index', ['products' => $products]);

    }

    public function getAddToCart(Request $request, $id) {
        $product = producten::find($id);
        $oldCart = Session::has('cart');
    }
}

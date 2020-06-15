<?php

namespace App\Http\Controllers;

use App\Cart;
use App\producten;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Session;

class products_controller extends Controller
{
    public function getProducts(){
        $products = producten::all();

        return view('webshop.index', ['products' => $products]);

    }

    public function getAddToCart(Request $request, $id) {
        $product = producten::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

    

        $request->session()->put('cart', $cart);
        dd($request->session()->('cart'));
        return redirect()->route('products.index');
    }
}

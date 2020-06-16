<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;


use App\Http\Requests;



class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();

        return view('webshop.index', ['products' => $products]);
    }

    public function getCart(Request $request)
    {
        if (!$request->session()->has('cart')) {
            return view('webshop.shoppingCart');
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        return view('webshop.shoppingCart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        return view('webshop.product_page', ['product' => $product]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);



        $request->session()->put('cart', $cart);
        return redirect()->route('products.index');
    }
}

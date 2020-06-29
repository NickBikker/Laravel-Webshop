<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Category;
use App\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Http\Requests;



class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('webshop.index', ['products' => $products, 'categories' => $categories]);
    }

    public function getCart(Request $request)
    {
        $categories = Category::all();
        if (!$request->session()->has('cart')) {
            return view('webshop.shoppingCart', ['categories' => $categories]);
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        return view('webshop.shoppingCart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'categories' => $categories]);
    }

    public function getProduct($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('webshop.product_page', ['product' => $product, 'categories' => $categories]);
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

    public function getReduce(Request $request, $id){
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceOne($id);

        if(count($cart->items) > 0){
            $request->session()->put('cart', $cart);
        }else{
            $request->session()->forget('cart');
        }
        return redirect()->route('webshop.shoppingCart');
    }

    public function getEmpty(Request $request, $id){
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->empty($id);

        if(count($cart->items) > 0){
            $request->session()->put('cart', $cart);
        }else{
            $request->session()->forget('cart');
        }
        return redirect()->route('webshop.shoppingCart');
    }

    public function getProductsFromCatId($catId) {
        $category = Category::find($catId);
        $products = DB::select('select * from products where category_id = ?', [$catId]);
        $categories = Category::all();

        return view('webshop.category', ['products' => $products, 'category' => $category, 'categories' => $categories]);
    }

    public function postCheckout(Request $request){
        if (!$request->session()->has('cart')){
            return redirect()->route('webshop.shoppingCart');            
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);

        try {
            $order = new order();
            $order->products = serialize($cart);
            

            Auth::user()->orders()->save($order);

        } catch (\Exception $e) {
            return redirect()->route('webshop.shoppingCart', ['error' => $e->getMessage()]);
        }

        $request->session()->forget('cart');
        return redirect()->route('products.index')->with('success', 'Successfully purchased products!');

    }

}

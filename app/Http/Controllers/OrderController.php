<?php

namespace App\Http\Controllers;
use App\Category;
use Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders()
    {
        $categories = Category::all();
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->products = unserialize($order->products);
            return $order;
        });
        return view('webshop.orderPage', ['orders'=> $orders, 'categories' => $categories]);
    }
}

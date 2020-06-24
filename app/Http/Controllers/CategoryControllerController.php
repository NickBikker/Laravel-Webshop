<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryControllerController extends Controller
{
    public function getCategories() {
        $categories = Category::all();
        return view('products.index', ['categories' => $categories]);
    }
}

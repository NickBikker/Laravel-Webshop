<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webshopController extends Controller
{
    public function index(){
        return view('webshop.index');
    }
}

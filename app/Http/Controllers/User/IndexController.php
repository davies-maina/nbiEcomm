<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        return view('user.index.main');
    }

    public function load_products(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(1);
        return response()->json($products, 200);
    }
}

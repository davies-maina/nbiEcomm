<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Section;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        $sections = Section::get();

        return view('user.index.main')->with(compact('sections'));
    }

    public function load_products()
    {
        /* $products = Product::InRandomOrder()->get(); */

        $products = Product::orderBy('created_at', 'desc')->InRandomOrder()->paginate(1);
        /* $products = Product::InRandomOrder()->paginate(1); */
        return response()->json($products, 200);
    }

    public function load_categories()
    {
        $categories = Category::where(['parent_id' => 0])->with(['subcategories', 'section'])->get();


        /* $categories = json_decode(json_encode($categories), true);
        echo '<pre>';
        print_r($categories);
        die; */

        return response()->json($categories, 200);
    }
}

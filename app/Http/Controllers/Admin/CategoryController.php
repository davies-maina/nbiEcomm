<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {

        $categories = Category::get();
        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request)
    {

        if ($request->ajax()) {

            $data = $request->all();
            /* echo "<pre>";
            print_r($data);
            die; */
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }

            Category::where('id', $data['category_id'])->update(['status' => $status]);
            return response()->json([
                'status' => $status,
                'category_id' => $data['category_id']

            ]);
        }
    }
}

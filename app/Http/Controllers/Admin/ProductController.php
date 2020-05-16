<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Section;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Session;

class ProductController extends Controller
{

    public function products()
    {

        $products = Product::with(['section', 'category'])->get();
        /* $products = json_decode(json_encode($products));

        echo '<pre>';
        print_r($products);
        die; */
        return view('admin.products.products')->with(compact('products'));
    }

    public function updateProductStatus(Request $request)
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

            Product::where('id', $data['product_id'])->update(['status' => $status]);
            return response()->json([
                'status' => $status,
                'product_id' => $data['product_id']

            ]);
        }
    }

    public function addEditProduct(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Add Product";
            $message = "Product added";
            $product = new Product;
            $productData = [];
            $getCategories = [];
        } else {
            $title = "Edit product";
            $message = "Product updated successfully";
            $productData = Product::with('category')->where('id', $id)->first();
            $productData = json_decode(json_encode($productData), true);
            /*  echo '<pre>';
            print_r($productData);
            die; */
            $getCategories = Category::with('subcategories')->where([/* 'parent_id' => 0,  */'section_id' => $productData['section_id']])->get();


            /* $getCategories = json_decode(json_encode($getCategories));
            echo '<pre>';
            print_r($getCategories);
            die; */

            $product = Product::find($id);
        }

        if ($request->isMethod('post')) {

            $data = $request->all();

            /* echo '<pre>';
            print_r($data);
            die; */

            $rules = [
                'product_name' => 'required',
                'section_id' => 'required',
                /* 'url' => 'required', */
                'product_image' => 'image',
                'product_price' => 'required|integer'

            ];

            $customMessages = [
                'product_name.required' => 'Product name is required',
                'section_id.required' => 'Section is required',
                /* 'url.required' => 'Category url required', */
                'product_image.image' => 'Valid image is required',
                'product_price.required' => 'Price is required'
            ];
            $this->validate($request, $rules, $customMessages);

            $product->category_id = $data['category_id'];
            $product->section_id = $data['section_id'];
            $product->product_name = $data['product_name'];
            if ($request->hasFile('product_image')) {
                $imgD = $request->file('product_image');
                if ($imgD->isValid()) {
                    $image_ext = $imgD->getClientOriginalExtension();

                    $image_name = rand(111, 999999) . '.' . $image_ext;

                    $image_path = 'images/admin_images/product_images/' . $image_name;

                    /* $current_image = Auth::guard('admin')->user()->image;
                    $current_image = 'images/admin_images/category_images/' . $current_image;

                    if (File::exists($current_image)) {
                        File::delete($current_image);
                    } */

                    Image::make($imgD)->resize(500, 500)->save($image_path);
                    $product->product_image = $image_name;
                }
            } /* else if (!empty($data['category_image'])) {
                $image_name = $data['category_image'];
                
               
            } */
            /* $category->category_image = '123.jpg'; */
            if (empty($data['product_code'])) {
                $data['product_code'] == '';
            }
            if (empty($data['product_description'])) {
                $data['product_description'] == '';
            }
            if (empty($data['product_color'])) {
                $data['product_color'] == '';
            }
            /* if (empty($data['meta_desc'])) {
                $data['meta_desc'] == '';
            }
            if (empty($data['meta_keywords'])) {
                $data['meta_keywords'] == '';
            } */


            $product->product_code = $data['product_code'];
            $product->product_description = $data['product_description'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];

            $product->status = 1;

            $product->save();
            Session::flash('success_message', $message);
            return redirect()->back();
        }

        $sections = Section::get();
        return view('admin.products.addeditproduct')->with(
            compact('title', 'sections', 'productData', 'getCategories')
        );
    }

    public function deleteProductImage($id)
    {

        $productImage = Product::select('product_image')->where('id', $id)->first();

        $imagePath = 'images/admin_images/product_images/';
        /* $productImage = json_decode(json_encode($productImage));
        echo '<pre>';
        print_r($productImage);
        die; */

        if (file_exists($imagePath . $productImage->product_image)) {
            unlink($imagePath . $productImage->product_image);
        }

        Product::where('id', $id)->update(['product_image' => '']);
        $message = 'Product image deleted successfully';
        Session::flash('success_message', $message);
        return redirect()->back();
    }

    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete();
        $message = 'Product deleted successfully';
        Session::flash('success_message', $message);
        return redirect()->back();
    }
}

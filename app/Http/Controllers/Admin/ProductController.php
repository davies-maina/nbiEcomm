<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Section;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\productattributes;
use Image;
use Session;

class ProductController extends Controller
{

    public function products()
    {

        $products = Product::with(['section', 'category', 'attributes'])->get();
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
            $getCategories = Category::with('subcategories')->where(['parent_id' => 0, 'section_id' => $productData['section_id']])->get();


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
            $category_details = Category::find($data['category_id']);
            $section_id = $category_details['section_id'];
            /* echo '<pre>';
            print_r($category_details['section_id']);
            die; */

            $rules = [
                'product_name' => 'required',
                /* 'section_id' => 'required', */
                /* 'url' => 'required', */
                'product_image' => 'image',
                'product_price' => 'required|integer'

            ];

            $customMessages = [
                'product_name.required' => 'Product name is required',
                /* 'section_id.required' => 'Section is required', */
                /* 'url.required' => 'Category url required', */
                'product_image.image' => 'Valid image is required',
                'product_price.required' => 'Price is required'
            ];

            $this->validate($request, $rules, $customMessages);


            $product->section_id = $category_details['section_id'];

            $product->category_id = $data['category_id'];
            $product->section_id = $section_id;
            $product->product_name = $data['product_name'];
            if ($request->hasFile('product_image')) {
                $imgD = $request->file('product_image');
                if ($imgD->isValid()) {
                    $image_ext = $imgD->getClientOriginalExtension();

                    $image_name = rand(111, 999999) . '.' . $image_ext;


                    $image_large_path = 'images/admin_images/product_images/large/' . $image_name;
                    $image_medium_path = 'images/admin_images/product_images/medium/' . $image_name;
                    $image_xsmall_path = 'images/admin_images/product_images/xsmall/' . $image_name;
                    $image_small_path = 'images/admin_images/product_images/small/' . $image_name;

                    Image::make($imgD)->save($image_large_path);

                    Image::make($imgD)->resize(508, 600)->save($image_medium_path); //medium image
                    Image::make($imgD)->resize(175, 207)->save($image_small_path); //small image
                    Image::make($imgD)->resize(70, 83)->save($image_small_path); //xsmall image

                    /* $current_image = Auth::guard('admin')->user()->image;
                    $current_image = 'images/admin_images/category_images/' . $current_image;

                    if (File::exists($current_image)) {
                        File::delete($current_image);
                    } */


                    $product->product_image = $image_name;
                }
            }

            if ($request->hasFile('product_video')) {
                $videoD = $request->file('product_video');
                if ($videoD->isValid()) {
                    $video_ext = $videoD->getClientOriginalExtension();

                    $video_name = rand(111, 999999) . '.' . $video_ext;

                    $video_path = 'videos/admin_videos/product_videos/' . $video_name;

                    $videoD->save($video_path, $video_ext);


                    $product->product_video = $video_name;
                }
            }
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
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->product_washcare = $data['product_washcare'];
            $product->product_fabric = $data['product_fabric'];
            $product->product_pattern = $data['product_pattern'];
            $product->product_sleeve = $data['product_sleeve'];
            $product->product_fit = $data['product_fit'];
            $product->product_occassion = $data['product_occassion'];
            /*  $product->is_featured = $data['is_featured']; */
            if (empty($data['is_featured'])) {
                $featured = 0;
            } else {
                $featured
                    = 1;
            }
            $product->is_featured = $featured;


            $product->status = 1;

            $product->save();
            Session::flash('success_message', $message);
            return redirect()->back();
        }

        $sections = Section::get();
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories), true);
        /* echo '<pre>';
        print_r($categories);
        die; */
        $fabricArray = array('Cottton', 'Polyester', 'Wool');
        $sleeveArray = array('Short sleeve', 'Half sleeve', 'Long sleeve');
        $patternArray = array('Checked', 'Plain', 'Printed', 'Self', 'Solid');
        $fitArray = array('Regular', 'Slim');
        $occassionArray = array('Formal', 'Casual');
        return view('admin.products.addeditproduct')->with(
            compact(
                'title',
                'sections',
                'categories',
                'productData',
                'getCategories',
                'fabricArray',
                'sleeveArray',
                'patternArray',
                'fitArray',
                'occassionArray'
            )
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

    public function addEditProductAttributes(Request $request, $id, $proAttrId = null)
    {
        if ($proAttrId == '') {
            $title = 'Add attributes';
            $productAttributesData = Product::with('attributes')->where('id', $id)->first();
            /* $productAttributesData = json_decode(json_encode($productAttributesData));
            echo '<pre>';
            print_r($productAttributesData);
        die; */
        } else {
            $title = 'Edit Attributes';
            $message = 'Attributes updated!';
            $productAttributesData = Product::with('attributes')->where('id', $id)->first();
            /* $productAttributesDataE = productattributes::with('product')->where(['id' => $proAttrId, 'product_id' => $id])->first(); */
            /* $productAttributesDataE = json_decode(json_encode($productAttributesDataE));
            echo '<pre>';
            print_r($productAttributesDataE);
            die; */
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            /* echo '<pre>';
                print_r($data);
                die; */

            foreach ($data['sku'] as $key => $val) {


                if (!empty($val)) {
                    $checkDuplicateSku = productattributes::where('sku', $val)->count();
                    if ($checkDuplicateSku > 0) {
                        $message = 'SKU already exists!';
                        Session::flash('success_message', $message);
                        return redirect()->back();
                    }

                    $checkDuplicateSizes = productattributes::where([
                        'product_id' => $id,

                        'size' => $data['size'][$key]
                    ])->count();

                    if ($checkDuplicateSizes) {
                        $message = $data['size'][$key] . '' . 'size already exists for this product!';
                        Session::flash('success_message', $message);
                        return redirect()->back();
                    }

                    $attribute = new productattributes;

                    $attribute->product_id = $data['product_id'];
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }
            }
            $message = 'Attributes saved!';
            Session::flash('success_message', $message);
            return redirect()->back();
        }
        return view('admin.products.addeditproductattributes')->with(compact('title', 'productAttributesData'));
    }

    public function deleteProductAttribute($id)
    {

        productattributes::where('id', $id)->delete();
        $message = 'Attribute deleted!';
        Session::flash('success_message', $message);
        return redirect()->back();
    }

    public function listingproducts()
    {

        return view('user.index.listing');
    }

    public function categoryproducts($url = null)
    {
        $categoryproducts = Category::where(['url' => $url])->first();
        $products = Product::where(['category_id' => $categoryproducts->id])->paginate(1);

        return response()->json($products, 200);
    }
}

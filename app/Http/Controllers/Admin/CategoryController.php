<?php

namespace App\Http\Controllers\Admin;

use App\Section;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Session;

class CategoryController extends Controller
{
    public function categories()
    {

        $categories = Category::with(['section', 'parentcategory'])->get();
        /* $categories = json_decode(json_encode($categories));
        echo '<pre>';
        print_r($categories);
        die; */
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

    public function addEditCategory(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Add category";
            $message = "Category added";
            $category = new Category;
            $categoryData = [];
            $getCategories = [];
        } else {
            $title = "Edit category";
            $message = "Category updated successfully";
            $categoryData = Category::where('id', $id)->first();
            $categoryData = json_decode(json_encode($categoryData), true);
            /* echo '<pre>';
            print_r($categoryData);
            die; */
            $getCategories = Category::with('subcategories')->where(['parent_id' => 0, 'section_id' => $categoryData['section_id']])->get();


            /* $getCategories = json_decode(json_encode($getCategories));
            echo '<pre>';
            print_r($getCategories);
            die; */

            $category = Category::find($id);
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            /* echo '<pre>';
            print_r($data);
            die; */

            $rules = [
                'category_name' => 'required',
                'section_id' => 'required',
                /* 'url' => 'required', */
                'category_image' => 'image'

            ];

            $customMessages = [
                'category_name.required' => 'Category name is required',
                'section_id.required' => 'Section is required',
                /* 'url.required' => 'Category url required', */
                'category_image.image' => 'Valid image is required'
            ];
            $this->validate($request, $rules, $customMessages);

            $category->parent_id = $data['parent_id'];
            $category->section_id = $data['section_id'];
            $category->category_name = $data['category_name'];
            if ($request->hasFile('category_image')) {
                $imgD = $request->file('category_image');
                if ($imgD->isValid()) {
                    $image_ext = $imgD->getClientOriginalExtension();

                    $image_name = rand(111, 999999) . '.' . $image_ext;

                    $image_path = 'images/admin_images/category_images/' . $image_name;

                    /* $current_image = Auth::guard('admin')->user()->image;
                    $current_image = 'images/admin_images/category_images/' . $current_image;

                    if (File::exists($current_image)) {
                        File::delete($current_image);
                    } */

                    Image::make($imgD)->resize(500, 500)->save($image_path);
                    $category->category_image = $image_name;
                }
            } /* else if (!empty($data['category_image'])) {
                $image_name = $data['category_image'];
                
               
            } */
            /* $category->category_image = '123.jpg'; */
            if (empty($data['category_discount'])) {
                $data['category_discount'] == '';
            }
            if (empty($data['category_desc'])) {
                $data['category_desc'] == '';
            }
            if (empty($data['meta_title'])) {
                $data['meta_title'] == '';
            }
            if (empty($data['meta_desc'])) {
                $data['meta_desc'] == '';
            }
            if (empty($data['meta_keywords'])) {
                $data['meta_keywords'] == '';
            }


            $category->category_discount = $data['category_discount'];
            $category->description = $data['category_desc'];
            $category->url = $data['category_url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_desc'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;


            $category->save();
            Session::flash('success_message', $message);
            return redirect()->back();
        }

        $sections = Section::get();

        return view('admin.categories.addeditcategory')->with(compact('title', 'sections', 'categoryData', 'getCategories'));
    }

    public function appendCategoryLevel(Request $request)
    {

        if ($request->ajax()) {
            $data = $request->all();
            /* echo '<pre>';
            print_r($data);
            die; */
            $getCategories = Category::with('subcategories')->where([
                'section_id' => $data['section_id'], 'parent_id' => 0,
                'status' => 1
            ])->get();
            $getCategories = json_decode(json_encode($getCategories), true);
            /*  echo '<pre>';
            print_r($getCategories);
            die; */
            return view('admin.categories.append_categories_level')->with(compact('getCategories'));
        }
    }

    public function deleteCategoryImage($id)
    {
        $categoryImage = Category::select('category_image')->where('id', $id)->first();

        $imagePath = 'images/admin_images/category_images/';
        /* $categoryImage = json_decode(json_encode($categoryImage));
        echo '<pre>';
        print_r($categoryImage);
        die; */

        if (file_exists($imagePath . $categoryImage->category_image)) {
            unlink($imagePath . $categoryImage->category_image);
        }

        Category::where('id', $id)->update(['category_image' => '']);
        $message = 'Category image deleted successfully';
        Session::flash('success_message', $message);
        return redirect()->back();
    }

    public function deleteCategory($id)
    {
        $catPro = Category::where('id', $id)->delete();
        /*  $catPro = json_decode(json_encode($catPro));
        echo '<pre>';
        print_r($catPro);
        die; */
        $message = 'Category deleted successfully';
        Session::flash('success_message', $message);
        return redirect()->back();
    }
}

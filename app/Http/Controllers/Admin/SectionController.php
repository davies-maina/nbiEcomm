<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;
use Session;
use Image;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sections()
    {
        $sections = Section::get();
        return view('admin.sections.sections')->with(compact('sections'));
    }

    public function updateSectionStatus(Request $request)
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

            Section::where('id', $data['section_id'])->update(['status' => $status]);
            return response()->json([
                'status' => $status,
                'section_id' => $data['section_id']

            ]);
        }
    }

    public function addEditSection(Request $request, $id = null)
    {


        if (isset($id)) {
            $title = "Edit section";
            $message = "Section updated successfully";
            $sectionData = Section::where('id', $id)->first();
            $sectionData = json_decode(json_encode($sectionData), true);



            $section = Section::find($id);

            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules = [
                    'name' => 'required',

                    'section_image' => 'image'

                ];

                $customMessages = [
                    'name.required' => 'Section name is required',

                    'section_image.image' => 'Valid image is required'
                ];
                $this->validate($request, $rules, $customMessages);
                $section->name = $data['name'];
                /* $section->status=1; */
                if ($request->hasFile('section_image')) {
                    $imgD = $request->file('section_image');
                    if ($imgD->isValid()) {
                        $image_ext = $imgD->getClientOriginalExtension();

                        $image_name = rand(111, 999999) . '.' . $image_ext;

                        $image_path = 'images/admin_images/section_images/' . $image_name;

                        /* $current_image = Auth::guard('admin')->user()->image;
                    $current_image = 'images/admin_images/category_images/' . $current_image;

                    if (File::exists($current_image)) {
                        File::delete($current_image);
                    } */

                        Image::make($imgD)->resize(500, 500)->save($image_path);
                        $section->section_image = $image_name;
                    }
                }
                $section->save();
                Session::flash('success_message', $message);
                return redirect()->back();
            }
        }


        /* Session::flash('success_message', $message);
        return redirect()->back(); */
        return view('admin.sections.editsection')->with(compact('sectionData', 'title'));
    }

    public function deleteSectionImage($id)
    {
        $sectionImage = Section::select('section_image')->where('id', $id)->first();

        $imagePath = 'images/admin_images/section_images/';
        /* $categoryImage = json_decode(json_encode($categoryImage));
        echo '<pre>';
        print_r($categoryImage);
        die; */

        if (file_exists($imagePath . $sectionImage->section_image)) {
            unlink($imagePath . $sectionImage->section_image);
        }

        Section::where('id', $id)->update(['section_image' => '']);
        $message = 'Category image deleted successfully';
        Session::flash('success_message', $message);
        return redirect()->back();
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}

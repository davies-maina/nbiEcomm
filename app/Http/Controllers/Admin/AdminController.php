<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Image;
use Session;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function dashboard()
    {

        return view('admin.admin_dashboard');
    }

    public function settings()
    {
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.admin_settings')->with(compact('adminDetails'));
    }

    public function checkCurrentPassword(Request $request)
    {
        $data = $request->all();
        /* echo "<pre>";
        print_r($data);
        die; */

        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function updateCurrentPwd(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            /* echo "<pre>";
            print_r($data);
            die; */

            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
                if ($data['new_pwd'] == $data['confirm_pwd']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                    Session::flash('success_message', 'Passord update success');
                } else {
                    Session::flash('error_message', 'new & confirm password do not match. Please try again');
                }
            } else {
                Session::flash('error_message', 'Incorrect current password. Please try again');
            }
            return redirect()->back();
        }
    }

    public function updateAdminData(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            /* echo '<pre>';
            print_r($data);
            die; */

            $rules = [
                'admin_name' => ['required', 'alpha', 'regex:/^[\pL\s\-\/]+$/u'],
                'mobile' => ['required', 'numeric'],
                'admin_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'

            ];
            $customMessage = [

                'admin_name.required' => 'An admin name is required',
                'admin_name.alpha' => 'Name can only have alphabets',
                'mobile.required' => 'Mobile is required',
                'mobile.numeric' => 'Enter valid number',
                'admin_image.mimes' => 'Valid image is required'
            ];
            $this->validate($request, $rules, $customMessage);

            if ($request->hasFile('admin_image')) {
                $imgD = $request->file('admin_image');
                if ($imgD->isValid()) {
                    $image_ext = $imgD->getClientOriginalExtension();

                    $image_name = rand(111, 999999) . '.' . $image_ext;

                    $image_path = 'images/admin_images/admin_photos/' . $image_name;

                    $current_image = Auth::guard('admin')->user()->image;
                    $current_image = 'images/admin_images/admin_photos/' . $current_image;

                    if (File::exists($current_image)) {
                        File::delete($current_image);
                    }

                    Image::make($imgD)->resize(200, 200)->save($image_path);
                }
            } else if (!empty($data['current_admin_image'])) {
                $image_name = $data['current_admin_image'];
            } else {
                $image_name = '';
            }


            Admin::where('email', Auth::guard('admin')->user()->email)
                ->update(['name' => $data['admin_name'], 'mobile' => $data['mobile'], 'image' => $image_name]);

            Session::flash('success_message', 'admin details updated successfully');
            return redirect()->back();
        }

        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.admin_update_data')->with(compact('adminDetails'));
    }


    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'email' => ['required', 'email', 'max:255'],
                'password' => ['required'],
            ];

            $customMessage = [

                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required'
            ];
            $this->validate($request, $rules, $customMessage);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                if ($request->session()->get('url.intended')) {
                    if (
                        $request->session()->get('url.intended') == 'http://nairobae/admin'

                    ) {

                        return redirect('/admin/dashboard');
                    }
                    return redirect($request->session()->get('url.intended'));
                }
            } else {
                Session::flash('error_message', 'Invalid credentials');
                return redirect()->back();
            }

            return redirect('/admin/dashboard');
        }

        $request->session()->put('url.intended', url()->previous());

        return view('admin.admin_login');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('url.intended');


        Auth::guard('admin')->logout();


        return redirect('/admin');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Session;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                return redirect('/admin/dashboard');
            } else {
                Session::flash('error_message', 'Invalid credentials');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}

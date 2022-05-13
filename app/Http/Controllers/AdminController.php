<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }

    public function Dashboard(){
        return view('admin.admin_master');
    }


    public function Login(Request $request){

        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])){
            return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
        }else{
            return back()->with('error','Invalid Email or Password');
        }

    }//end method

    public function AdminLogout(){

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('error','Admin Logout Successfully');

    } //end method

    

}



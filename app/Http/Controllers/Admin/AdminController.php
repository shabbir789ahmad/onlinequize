<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    function adminLogin(Request $req)
    {
      
     $cred=$req->only('email','password');
     
      if(Auth::guard('admin')->attempt($cred,$req->remember))
        {
        
          return redirect()->route('admin.dashboard');
        
        }else
        {
            
          return redirect()->back()->with('adminerror','These Credentials Does Not Match Our Record');
        }
    }

     public function logout()
    {
      if(Auth::guard('admin')->logout())
      {
        return redirect(route('admin.login'));
      }
    }
    public function __construct()
    {
        $this->middleware('admin.guest')->except('logout');
    }
     protected function guard()
    {
        return Auth::guard('admin');
    }
}

<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class VendorController extends Controller
{
     function adminLogin(Request $req)
    {
      
     $cred=$req->only('vendor_email','password');
   
      if(Auth::guard('vendor')->attempt($cred,$req->remember))
        {
         
          return redirect()->route('vendor.dashboard');
        
        }else
        {
            
          return redirect()->back()->with('adminerror','something is wrong');
        }
    }



    public function logout()
    {
      if(Auth::guard('vendor')->logout())
      {
        return redirect(route('vendor.login'));
      }
    }
    public function __construct()
    {
        $this->middleware('vendor.guest')->except('logout');
    }
     protected function guard()
    {
        return Auth::guard('vendor');
    }


}

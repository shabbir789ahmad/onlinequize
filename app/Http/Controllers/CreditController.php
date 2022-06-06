<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credit;
use Auth;
class CreditController extends Controller
{
    function credit(Request $request)
    {
      // $request->validate([
      //   'user_id'=>'required',
      //   'credit'=>'required',
      // ]);

      $credit=Credit::where('user_id',Auth::id())->first();
        
        if($credit)
        {
        
         $credit->credit=$credit->credit +1;
         $credit->save();
        
        }else
        {
          Credit::create([

             'user_id'=>Auth::id(),
             'credit'=>1,
            ]);
        }
        
      return response()->json('1 Paisa Credited');
    }
}

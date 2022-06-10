<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credit;
use Auth;
class PayoutController extends Controller
{
    function payout()
    {
      $balance=Credit::where('user_id',Auth::id())
            ->select('credit','earned')
            ->first();
      

        return view('user.payout',compact('balance'));
    }
}

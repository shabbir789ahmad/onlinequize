<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quize;
use App\Models\Question;
use Auth;
class HomeController extends Controller
{
    
    public function index()
    {
        $quizes=Quize::wheredate('start_date',date('Y-m-d'))
            ->get();
         
        return view('home',compact('quizes'));

    }

    function startQuiz($id)
    {
        if(Auth::user())
        {

            $quiz=Quize::where('id',$id)->first();
             //dd($quiz);
            return view('gameshow',compact('quiz'));
           
        }else
        {

           return to_route('login')->with('message','Please Login First To play Game');
        }
       
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quize;
use App\Models\Question;
use App\Helpers\LifeLineHelper;
use App\Helpers\Progress;

use Auth;
use Http;
class HomeController extends Controller
{
    protected $lifeline;
   function __construct(LifeLineHelper $lifeline)
   {
    $this->lifeline=$lifeline;
   }

    public function index()
    {
        $quizes=Quize::wheredate('start_date',date('Y-m-d'))
            ->get();
 
        return view('home',compact('quizes'));

    }

   public function allShows()
    {
        $quizes=Quize::wheredate('start_date',date('Y-m-d'))
            ->get();
       
        return view('shows',compact('quizes'));

    }
    

    function startQuiz($id)
    {
       
      
        if(Auth::user())
        {
            $lifeline=$this->lifeline->lifline();
            if($lifeline)
            {
                $quiz=Quize::where('id',$id)->first();
            }else{
                $quiz=null;
            }
            $skip=Progress::skipQuestion($id);
           
            return view('gameshow',compact('quiz','lifeline','skip'));
           
        }else
        {

           return to_route('login')->with('message','Please Login First To play Game');
        }
      
    }
}

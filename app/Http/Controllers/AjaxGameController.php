<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Helpers\GetSingleQuestion;
use App\Helpers\MarkQuestion;
use App\Helpers\Progress;
use App\Models\Quize;
use App\Helpers\LifeLineHelper;
use Auth;
class AjaxGameController extends Controller
{   

 


    function getQuestion($id,Request $request)
    {
        $quiz=Quize::where('id',$id)->first();
        $answer=Progress::answerQuestion($id);
        $skip=Progress::skipQuestion($id);
        $right=Progress::right($id);
        $wrong=Progress::wrong($id);
        
        $curren_time = strTotime(date("H:i:s"));
        $start_time = strTotime($quiz->start_time);
        $end_time = strTotime($quiz->end_time);
        
      
        if($start_time <= $curren_time)
        {
            if($end_time >= $curren_time) 
            {
                $quiz=GetSingleQuestion::singleQuestion($id,$request->qid);
                if(gettype($quiz)=='string')
                {
               
                 return response()->json(['right'=>$right,'wrong'=>$wrong,'answer'=>$answer,'skip'=>$skip,'message'=>$quiz]);
                }else
                {
                   
                 return response()->json(['right'=>$right,'wrong'=>$wrong,'answer'=>$answer,'skip'=>$skip,'quiz'=>$quiz]);
                
                }
               
            }else
            {
              return response()->json(['right'=>$right,'wrong'=>$wrong,'answer'=>$answer,'skip'=>$skip,'message'=>'Game Time Over']);
            }
            
        }else
        {
           return response()->json(['right'=>$right,'answer'=>$wrong,'wrong'=>$answer,'skip'=>$skip,'message'=>'There is Still Time  To Start Show']);
        }
        
    }

   


    function mark(Request $request)
    { 

       $status=MarkQuestion::markOrSkipQuestion($request->quize_id,$request->question_id,$request->option_id,$request->skip_question);

         $skip=$this->skipQuestion();
          if($skip >= 1)
          {
            $skip=$skip;
          }

       return response()->json(['skip'=>$skip]);
    }



    function skipQuestion()
    {
      return UserAnswer::where('user_id',Auth::id())->where('status','skip')->count();
    }
    


}

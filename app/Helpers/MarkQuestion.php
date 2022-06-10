<?php
namespace App\Helpers;
use App\Models\UserAnswer;
use App\Models\QuestionOption;
use App\Models\LifeLine;
use Auth;
use App\Helpers\Progress;
class MarkQuestion
{
 
  public static function markOrSkipQuestion($quize_id,$question_id,$option_id,$skip_question)
  {
      
      $status=self::getQuestionOptionStatus($option_id);

      if($skip_question=='skip')
      {
        $statu='skip';
        
      }else
      {
      
      $statu=$status['is_correct'];
      }
     
     UserAnswer::create([
           
                  'quize_id'=>$quize_id,
                   'question_id'=>$question_id,
                   'question_option_id'=>$option_id,
                   'user_id'=>Auth::id(),
                   'status'=>$statu,
        ]);
   
      if($statu==0 )
      {
         self::lifeline();
  	    return $statu;
      }
       
  
  }


  static function lifeline()
  {
    LifeLine::where('user_id',Auth::id())->decrement('lifeline');
  }



 protected static  function getQuestionOptionStatus($option_id)
  {
    return QuestionOption::where('id',$option_id)->first('is_correct');
  }

}


 ?>
<?php
namespace App\Helpers;
use App\Models\UserAnswer;
use App\Models\QuestionOption;
use Auth;
use App\Helpers\Progress;
class MarkQuestion
{
 
    public static function markOrSkipQuestion($quize_id,$question_id,$option_id,$skip_question)
  {
      if($skip_question=='skip')
      {
        $status='skip';
      }else
      {
       $status=self::getQuestionOptionStatus($option_id);
       $status=$status['is_correct'];
      }
     

  	 UserAnswer::create([
				   
				          'quize_id'=>$quize_id,
                   'question_id'=>$question_id,
                   'question_option_id'=>$option_id,
                   'user_id'=>Auth::id(),
                   'status'=>$status,
				]);
       
  
  }

 protected static  function getQuestionOptionStatus($option_id)
  {
    return QuestionOption::where('id',$option_id)->first('is_correct');
  }

}


 ?>
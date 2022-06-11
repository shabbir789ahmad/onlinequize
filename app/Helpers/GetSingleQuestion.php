<?php
namespace App\Helpers;

use App\Models\Question;
use App\Models\Lifeline;
use DB,Auth;
class GetSingleQuestion
{
    
	public static function singleQuestion($quize_id,$qid)
	{
		$question_count=\DB::table('questions')
		->where('quize_id',$quize_id)
		->count();
        
        $answer=\DB::table('user_answers')
		->where('quize_id',$quize_id)
		->where('user_id',Auth::id())
		->count();

		$currents=\DB::table('user_answers')
		->where('quize_id',$quize_id)
		->get();

		$lifeline=self::life();
		
       if($lifeline['lifeline'] > 0)
       {
         if(count($currents )>0)
         {
         	if($question_count > $answer)
         	{
         	   foreach($currents as $curent)
         	    {
                   $question =self::question($quize_id,$curent->question_id);

         	   }
   
                return $question;
         	}else{
         		
         		return $quiz='Quiz Over! Thank You For Participation';
         	}

         	
         
         }else
         {
             return self::question($quize_id,$qid);
	  }

       }else
       {
          return $quiz='you dont have more Lifeline To Continue';
       }
	   
   }

   static function life()
    {
     return Lifeline::where('user_id',Auth::id())->first('lifeline');
    }

   static function question($quize_id,$qid)
    {

    return Question::with('options')
			->where('quize_id', $quize_id)
			->where('id','!=', $qid)
			->orderBy(DB::raw('RAND()'))
			->first();
    }
     

}
?>
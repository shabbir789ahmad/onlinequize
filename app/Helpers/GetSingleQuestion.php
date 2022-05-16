<?php
namespace App\Helpers;

use App\Models\Question;
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
		->count();

		$currents=\DB::table('user_answers')
		->where('quize_id',$quize_id)
		->get();

		
    
         if(count($currents )>0)
         {
         	if($question_count > $answer)
         	{
         		foreach($currents as $curent)
         	    {
                $question =Question::with('options')
			    ->where('quize_id', $quize_id)
			    ->where('id','!=', $curent->question_id)
			    ->orderBy('id')->first();

         	   }
   
                return $question;
         	}else{
         		
         		return $quiz='You Are all Cauth Up';
         	}

         	
         
         }else
         {
         	
          return  $question =Question::with('options')
			  ->where('quize_id', $quize_id)
			  ->where('id','!=', $qid)
			  ->orderBy('id')
			  ->first();

			 
         }
           
              
             
			   
 
			
	   
 }

}
?>
<?php
namespace App\Helpers;
use App\Models\UserAnswer;
/**
 * 
 */
class Progress {
	
   public static function answerQuestion($quize_id)
	{
		return UserAnswer::where('quize_id',$quize_id)
		   ->where('status','!=','skip')
		   ->count();
	}


   public static function skipQuestion($quize_id)
	{
		return UserAnswer::where('quize_id',$quize_id)
		   ->where('status','=','skip')
		   ->count();
	}

	public static function right($quize_id)
	{
		return UserAnswer::where('quize_id',$quize_id)
		   ->where('status',1)
		   ->count();
	}

	public static function wrong($quize_id)
	{
		return UserAnswer::where('quize_id',$quize_id)
		   ->where('status','0')
		   ->count();
	}



}
?>
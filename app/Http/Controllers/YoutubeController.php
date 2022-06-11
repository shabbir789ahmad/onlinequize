<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\YoutubeHelper;
use App\Models\Youtube;
use App\Models\Lifeline;
use App\Helpers\LifeLineHelper;
use Auth,Http;
use Google_Client,Google_Service_YouTube;
class YoutubeController extends Controller
{
  protected $lifeline;
   function __construct(LifeLineHelper $lifeline)
   {
    $this->lifeline=$lifeline;
   }

    function index()
    {  
         $results=YoutubeHelper::youtubeVideos();

        return view('Youtube_video',compact('results'));
    }

    function create()
    {
       $results=YoutubeHelper::youtubeVideos();
        $lifeline=$this->lifeline->lifline();
       
       
        return view('watch_videos',compact('results','lifeline'));
    }

    
    function store(Request $request)
    {
        $lifeline=LifeLine::where('user_id',Auth::id())->first();
        
        if($lifeline)
        {

         $lifeline->lifeline=$lifeline->lifeline+1;
         $lifeline->save();

        }else{
            LifeLine::create([
          
                'lifeline'=>1,
                'user_id'=>Auth::id(),
           ]);
        }
        $lifeline=$this->lifeline->lifline();
        return response()->json(['success'=>'You Get One Lifeline','lifeline'=>$lifeline]);
    }


   
 

 
}

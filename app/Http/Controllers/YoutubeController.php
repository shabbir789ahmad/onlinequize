<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\YoutubeHelper;
use App\Models\Youtube;
use Auth,Http;
class YoutubeController extends Controller
{


    function index()
    {   $id='RN48puckq8o';
         $results=YoutubeHelper::youtubeVideos('TheSahafiTV');
        
        return view('Youtube_video',compact('results'));
    }


    
 

 
}

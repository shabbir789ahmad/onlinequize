<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\YoutubeHelper;
use App\Models\Youtube;
use Auth,Http;
use Google_Client,Google_Service_YouTube;
class YoutubeController extends Controller
{


    function index()
    {  
         $results=YoutubeHelper::youtubeVideos('TheSahafiTV');

        return view('Youtube_video',compact('results'));
    }


    
 

 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\YoutubeHelper;

use Auth,Http;
class YoutubeController extends Controller
{


    function index()
    {
         $results=YoutubeHelper::youtubeVideos('Sahafi TV');
        $id=Auth::user()->provider_id;
        $country='pk';
        $api_key=Config('services.youtube.api_key');
        

         $url="https://www.googleapis.com/youtube/v3/subscriptions?id=subscriberSnippet&regionCode=$country&forChannelId=UCshJkIDg8JxgFLzlXGZAgFg&mine=true&key=$api_key";

        $response=Http::get($url);
         $results = json_decode($response);
         dd($results);
        return view('Youtube_video',compact('results'));
    }


    


 
}

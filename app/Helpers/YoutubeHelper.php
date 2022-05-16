<?php
namespace App\Helpers;
use Http,File;
/**
 * 
 */
class YoutubeHelper {
	
   public static function  youtubeVideos($search)
    {

        $part='Snippet';
        $country='pk';
        $max_result='1';
        $api_key=Config('services.youtube.api_key');
        $search_endpoint=Config('services.youtube.search_endpoint');
        $type="video";
        
        $url="$search_endpoint/search?part=$part&maxResults=$max_result&regionCode=$country&type=$type&key=$api_key&q=$search";

        $response=Http::get($url);
         $results = json_decode($response);
        File::put(storage_path() . '/app/public/results.json', $response->body());
        return $results;
     
        
    }

  



}
?>
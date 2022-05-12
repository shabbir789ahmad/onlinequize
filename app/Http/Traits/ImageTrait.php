<?php

namespace App\Http\Traits;

trait ImageTrait
 {

    function image()
   {
       $req = app('request');
          $image='';
       if($req->hasfile('image'))
       {
         $file=$req->file('image');
         $ext=$file->getClientOriginalExtension();
         $filename=time(). '.' .$ext;
         $file->move('uploads/brand/' , $filename);
         $image=$filename;
        }

       return $image;;
   }

 }

?>
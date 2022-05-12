<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class SubCategory extends Model
{
    use HasFactory;
    protected $fillable=['sub_category_name','sub_category_image','category_id','vendor_id'];


  static  function  subcategorie()
    {
         $data =Category::
         join('sub_categories','categories.id','=','sub_categories.category_id')
         ->select('categories.category_name','sub_categories.sub_category_name','sub_categories.sub_category_image','sub_categories.created_at','sub_categories.id')
         ->get();

       
        return $data;
    }



}

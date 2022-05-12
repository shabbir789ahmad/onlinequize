<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['category_name','category_image','vendor_id'];

 static function category()
  {
    return Category::select('category_name','category_image','id')->get();
  }

}

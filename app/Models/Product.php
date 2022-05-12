<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{
    use HasFactory;

   protected $fillable=[

     'product_name',
     'product_detail',
     'category_id',
     'sub_category_id',
     'product_code',
     'vendor_id',
   ];




     public static function getProducts()
      {
        
        $query = DB::table('products')
            ->select('categories.category_name', 'sub_categories.sub_category_name', 'products.product_name','product_brands.product_id','product_brands.id','product_brands.product_brand')
            
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', 'products.sub_category_id')
         
            ->leftjoin('product_brands', 'product_brands.product_id','=','products.id');
            
          $data=$query->get();
        return $data;

    }
}

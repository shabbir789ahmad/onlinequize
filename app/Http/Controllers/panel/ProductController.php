<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductStock;
use App\Models\ProductImage;
use App\Models\Category;
class ProductController extends Controller
{
    function index()
    {
        $products=Product::getProducts();//from product model

       foreach( $products as $product)
        {
 
         $product->image=ProductImage::where('product_id',$product->product_id)->select('product_image')->first();
         $product->stock=ProductStock::where('product_brand_id',$product->id)->select('stock','stock_sold')->first();
        }
      
       return view('Dashboard.panel.product.index',compact('products'));
    }

    function create()
    {
        
        $categories=Category::category();//from category model
         return view('Dashboard.panel.product.create',compact('categories'));
    }


    function store(Request $request)
    {

        $request->validate([

          'product_name'=>'required',
          'product_detail'=>'required',
          'category_id'=>'required',
          'sub_category_id'=>'required',
          'product_code'=>'required',
          'stock'=>'required',
          'selling_price'=>'required',
          'purchasing_price'=>'required',
          'product_image'=>'required',
        ]);

        $product=Product::create([

            'product_name'=>$request->product_name,
            'product_detail'=>$request->product_detail,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'product_code'=>$request->product_code,
             'vendor_id' => 1,
        ]);

         $n3 = sizeof($request->product_brand);
         for($i = 0;  $i < $n3; $i++)
          {
             $brand= ProductBrand::create([
           'product_brand' =>$request->product_brand[$i],
         
           
           'product_id' =>$product->id,
           ]);
          }

        
             $brand= ProductStock::create([
           'stock' =>$request->stock,
           'selling_price' =>$request->selling_price,
           'purchasing_price' =>$request->purchasing_price,
           'product_tax' =>$request->product_tax??null,
           
           'product_brand_id' =>$brand->id,
           ]);
     

       foreach($request->file('product_image') as $file)
     {
       ProductImage::create([
       $ext=$file->getClientOriginalExtension(),
       $name=$file->getClientOriginalName(),
       $filename=$name,
       $file->move('uploads/img/', $filename),
       'product_image'=>$filename,
       'product_id'=> $product->id,
        ]);
      
     }


     return to_route()->with('success','Product Created successfully');

    } 


    function edit($id)
    {
        $product=Product::findorfail($id);
         return view('Dashboard.panel.product.edit',compact('product'));
    }

    function update($id,Request $request)
    {

    }


    function destroy($id)
    {
        product::destroy($id);

        return redirect()->back()->with('success','Product Deleted');
    }
}

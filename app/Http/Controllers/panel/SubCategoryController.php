<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Http\Traits\ImageTrait;
class SubCategoryController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories=SubCategory::subcategorie();
        return view('Dashboard.panel.sub_categories.index',compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::category();
        return view('Dashboard.panel.sub_categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

           'sub_category_name'=>'required',
           'image'=>'required',

        ]);

        $data=[
            'sub_category_name'=>$request->sub_category_name,
            'sub_category_image'=>$this->image(),
            'category_id'=>$request->category_id,
            'vendor_id'=>1,
            ];

         return \FormHelper::createEloquent(new SubCategory, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subCategory(Request $request)
    {
        $categories=SubCategory::where('category_id',$request->id)->get();
        return response()->json($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $sub_category=SubCategory::findorfail($id);
        return view('Dashboard.panel.sub_categories.edit',compact('sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

           'sub_category_name'=>'required',
           'image'=>'required',

        ]);

        $data=[
            'sub_category_name'=>$request->sub_category_name,
            'sub_category_image'=>$this->image(),
            'category_id'=>$request->category_id,
            'vendor_id'=>1,
            ];

         return \FormHelper::updateEloquent(new SubCategory,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \FormHelper::deleteEloquent(new SubCategory,$id);
    }
}

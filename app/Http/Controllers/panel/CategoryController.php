<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Traits\ImageTrait;
class CategoryController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::category();
        return view('Dashboard.panel.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.panel.categories.create');
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

           'category_name'=>'required',
           'image'=>'required',

        ]);

        $data=[
            'category_name'=>$request->category_name,
            'category_image'=>$this->image(),
            'vendor_id'=>1,
            ];

         return \FormHelper::createEloquent(new Category, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $category=Category::findorfail($id);
        return view('Dashboard.panel.categories.edit',compact('category'));
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

           'category_name'=>'required',
           'image'=>'required',

        ]);

        $data=[
            'category_name'=>$request->category_name,
            'category_image'=>$this->image(),
            'vendor_id'=>1,
            ];

         return \FormHelper::updateEloquent(new Category,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \FormHelper::deleteEloquent(new Category,$id);
    }
}

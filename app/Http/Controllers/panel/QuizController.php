<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quize;
use App\Http\Traits\ImageTrait;
class QuizController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizes=Quize::quizes();
        return view('Dashboard.panel.quize.index',compact('quizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.panel.quize.create');
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

           'quize_name'=>'required',
           'image'=>'required',
           

        ]);
  
        $data=[
            'quize_name'=>$request->quize_name,
            'start_date'=>$request->start_date,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'time_per_question'=>$request->time_per_question,
             'quize_images'=>$this->image(),
           
            ];

         return \FormHelper::createEloquent(new Quize, $data);
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \FormHelper::deleteEloquent(new Quize,$id);
    }
}

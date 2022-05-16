<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quize;
use App\Models\QuestionOption;
use App\Http\Traits\ImageTrait;
class QuestionController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Quize::join('questions','quizes.id','=','questions.quize_id')->get();
        return view('Dashboard.panel.question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizes=Quize::all();
        return view('Dashboard.panel.question.create',compact('quizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      foreach($request->question as $ques)
      {
        $question_data = [

            'question' => $ques,
            'marks' => $request->marks,
            'quize_id' => $request->quize_id,
            

        ];

         $question = Question::create($question_data);
         $question_options = [];
         
        for ($i=0; $i < count($request->options) ; $i++)
         { 
            $temp = [];
            $temp['option'] = $request->options[$i] ;
            $temp['question_id'] = $question['id'] ;
            if ($i == array_keys($request->correct)[0]) {
                $temp['is_correct'] = 1;
            }
            else{
                $temp['is_correct'] = 0;   
            }

            $question_options[] = $temp;
        }

        
       QuestionOption::insert($question_options);
      }
    return to_route('question.index')->with('success','question created');
        
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
        // $brand=Brand::findorfail($id);
        // return view('Dashboard.panel.brands.edit',compact('brand'));
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

        return \FormHelper::deleteEloquent(new Question,$id);
    }
}

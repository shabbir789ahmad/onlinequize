@extends('master.master')

@section('content')

<div class="container-fluid mt-5 ">
  <div class="heding">
      <h1>{{ucfirst($quiz['quize_name'])}}</h1>
  </div>
</div>
<a href="{{route('lifeline.index')}}" class="btn btn-warning mb-3"> Get LifeLine</a>
<div class="container-fluid  mb-5">
   <div class="spinner-border text-light spinner" role="status">
     <span class="sr-only">Loading...</span>
   </div>

    <div class="row ">
       <div class="col-md-8">
            <div class="card shadow" >
              <div class="card-header py-3" style="background-color: #09192C; color: #fff;">
               Q : <span id="question_name"></span>
               <input type="hidden" id="question_id" >
              </div>
              <div class="card-body " id="game_over_message">
                <div class="row option_appends">
                  
             

             

                </div>
                <div class="button mt-5 " style="display: flex; justify-content: center;">
                  <button class="btn btn-warning m-2 btn-lg next_question">Mark And Next</button>
                  <button class="btn btn-success m-2 p-2 btn-lg skip_question">Skip Question</button>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow" >
              <div class="card-body">
                <h4>Question Summary</h4>
                  <div class="row">
                    <div class="col-md-6 p-0">
                     <div class="bg-success text-center text-dark p-3">
                       <p class="mb-1 answered_question">0</p>
                       <p>Answered</p>
                     </div>
                    </div>
                    <div class="col-md-6 p-0">
                     <div class="bg-warning text-center text-dark p-3">
                       <p class="mb-1 skiped_question">0</p>
                       <p>Skiped</p>
                     </div>
                    </div>
             </div>
            </div>
        </div>
       
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">

   //clik option ot select
  $(document).on('click','.option_click',function(){

     let v=$(this).children('div').children('span').find('input').prop('checked',true);
   });

  //get single questionto show on page
  getQuestion(0);
   

  $(document).on('click','.next_question',function(){

   $('.spinner').css('display','block');
    let skip_question='';
    markQuestion( skip_question)
 
  });
  $(document).on('click','.skip_question',function(){

   $('.spinner').css('display','block');
    let skip_question='skip';
    markQuestion( skip_question)
 
  });

 
  //run script after some interval to load new question
  //and skip old question
  
  let intervalID= setInterval(function()
  {

       $('.spinner').css('display','block');
        let skip_question='skip';
        markQuestion( skip_question)
  

  },"{{ $quiz->time_per_question * 1000 }}");

  function getQuestion(question_id)
  {

      $.ajax({
        url:'/get/single/'+ "{{ $quiz->id }}" +'/question',
        data:{
          qid:question_id,
        }
      })
      .done(function(resp)
       {
        $('.answered_question').html(resp.answer);
        $('.skiped_question').html(resp.skip);

        if(resp.message)
        {
          
          $('#game_over_message').html('')
          $('#game_over_message').html(resp.message)
           clearInterval(intervalID)

        }else if(resp.quiz){
          let res=resp.quiz;
        $('#question_name').html(res.question)
        $('#question_id').val(res.id)
        $('.option_appends').empty();
        
        $.each(res.options,function(index,value)
        {
          $('.option_appends').append(`
            
            <div class="form-group mt-3 col-6 ">
                  <div class="input-group option_click">
                   <div class="input-group-prepend">
                     <span class="input-group-text py-3 input_border_color"><input type="radio" name="correct" value="${value.id}" class="option_input"></span>
                    </div>
                    <input type="text" name="option" class="form-control input_border_color" value="${value.option}" readonly>
                  </div>
                 </div>

            `);
        });

        $('.spinner').css('display','none');
      }
      }).fail(function() {
        
      })
      .always(function(res) {
        $('.spinner').css('display','none');
      
      });
  }


  function markQuestion(skip_question)
  {

     let selected=$('input[name="correct"]:checked').val();
     if(skip_question !=='skip')
     {
      if(selected)
      {
      
        $('.spinner').css('display','block');
        ajaxskipmark(selected,skip_question)
     
      }else
      {
      
       alert('please Select Option');
       $('.spinner').css('display','none');
     
      }

     }else
     {
       $('.spinner').css('display','block');
        ajaxskipmark(selected='',skip_question)
     }  
      
  }


  function ajaxskipmark(selected,skip_question)
  {
     $.ajax({
        url:'/ajax/quiz/mark',
        type: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            question_id: $('#question_id').val(),
            option_id: selected,
            quize_id: "{{ $quiz->id }}",
            skip: skip_question,

          },
      })
      .done(function(res) {

        getQuestion("{{ $quiz->id }}");
        
      })
      .fail(function()
       {
        $('.spinner').css('display','none'); 
      })
      .always(function(res) {
        
      
      });
  }



  
</script>
@endsection

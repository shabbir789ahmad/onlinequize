@extends('master.master')
@section('content')

<title>Game Show</title>
<div class="container-fluid  mb-5">
   <div class="spinner-border text-light spinner" role="status">
     <span class="sr-only">Loading...</span>
   </div>

    <div class="row ">
       <div class="game_panel mt-1">
        <img src="{{asset('img/photos/bg-stage.db045302.jpg')}}" class="background_image" >
        @if($lifeline ==null)
        <div class="card shadow card_show" >
              <div class="card-header game_card_header text-center py-3" >
               <h2  class="mt-5 fw-bold">You Do Not Have Any LifeLine</h2>
               <a href="{{route('lifeline.create')}}" class="btn btn-danger mt-4">Click here To Get LifeLine</a>
               
              </div>
              
            </div>
        @else
            <div class="card shadow card_show" >
              <div class="card-header game_card_header py-3">
               <h2 id="question_name" class="mt-5 text-center fw-bold"></h2>
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
            @endif
        </div>
        <div class="task_panel  mt-1">
            <div class="card shadow" style="background-color: #09192C;" >
              <div class="card-body text-light text-center">
               
                  <div class="row">
                    <div class="col-md-6 p-0">
                     <div class="bg-success text-center text-light p-3">
                       <p class="mb-1 answered_question">0</p>
                       <p>Answered</p>
                     </div>
                    </div>
                    <div class="col-md-6  p-0">
                     <div class="bg-warning text-center text-dark p-3">
                       <p class="mb-1 skiped_question">0</p>
                       <p>Skiped</p>
                     </div>
                    </div>
                    <div class="col-md-6 mt-2 p-0">
                     <div class="bg-success text-center text-light p-3">
                       <p class="mb-1 rightAnswer">0</p>
                       <p>Right</p>
                     </div>
                    </div>
                    <div class="col-md-6 mt-2  p-0">
                     <div class="bg-warning text-center text-dark p-3">
                       <p class="mb-1 wrongAnswer">0</p>
                       <p>Wrong</p>
                     </div>
                    </div>
                    <div class="col-md-12 mt-1 p-0">
                    <img src="{{asset('img/photos/game-show-party-invitation-design-template-38e5ad3b6c10032a661bcdf187d244d8_screen.jpg')}}" width="100%" height="450rem">
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
  
  <?php if($quiz != null){  ?>
    //get single questionto show on page
    getQuestion(0);
   
  
  
  <?php }else{ ?>

   clearInterval(intervalID)

  <?php }?>


  let intervalID= setInterval(function()
  {
        let skip_question='skip';
        markQuestion(skip_question)
  
  },"{{ $quiz->time_per_question * 1000 }}");


  function getQuestion(question_id)
  {

  
      $.ajax({
        url:'/get/single/'+ "<?php if($quiz !=null) echo $quiz->id ?>" +'/question',
        data:{
          qid:question_id,
        }
      })
      .done(function(resp)
       {
         
        $('.answered_question').html(resp.answer);
        $('.skiped_question').html(resp.skip);
        $('.rightAnswer').html(resp.right);
        $('.wrongAnswer').html(resp.wrong);

        if(resp.message)
        {
          
          $('#game_over_message').html('')
          $('#question_name').html(resp.message)

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
            skip_question: skip_question,
            quize_id: "<?php if($quiz !=null) echo $quiz->id ?>"

          },
      })
      .done(function(res) {
  
        if(res.skip >=1 )
        {
         
         clearInterval(intervalID)
         $('.skip_question').prop('disabled',true)
        getQuestion("<?php if($quiz !=null) echo $quiz->id ?>");
        }else{
          
          getQuestion("<?php if($quiz !=null) echo $quiz->id ?>");
        }
       $('.spinner').css('display','none'); 
        
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

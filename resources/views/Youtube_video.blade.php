@extends('master.master')

@section('content')
<div class="container-fluid mt-3 mb-3" style="display:flex;justify-content: space-between;">
  <div class="heding ">
      <h1>Watch Our Videos</h1>
       <div id="subCount"></div>
  </div>
  <div class=" " id="block">
  <button id="subscribe" onclick="authenticate().then(loadClient)" class="btn btn-danger btn-block">Subscribe</button>
  
</div>

          </div>
   
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
          <?php $i=0; ?>
          @foreach($results->items as $item)
          <?php  $i++; ?>
            <div id="player{{$i}}" data-id="{{$item->id->videoId}}"></div>
            <p ><span id="current-time{{$i}}"></span> <span id="duration{{$i}}" class="float-end"></span></p>
          @endforeach   

            </div>
    </div>
  
</div>


 <script>
      
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      
      let player1, player2, player3, player4;
      function onYouTubeIframeAPIReady() {

        let id='';
        let videoId='';
         id= document.getElementById('player1');
         videoId=id.getAttribute('data-id');
         player1= createVideo(id,videoId)

        id= document.getElementById('player2');
        if(id)
        {

         videoId=id.getAttribute('data-id');
         player2= createVideo(id,videoId)
        }
       
      
      id= document.getElementById('player3');
        if(id)
        {

         videoId=id.getAttribute('data-id');
         player3= createVideo(id,videoId)
        }

        id= document.getElementById('player4');
        if(id)
        {

         videoId=id.getAttribute('data-id');
         player4= createVideo(id,videoId)
        }
       

      }

      function createVideo(id,videoId)
      {
     
       return new YT.Player(id, {
          height: '390',
          width: '690',
          videoId: videoId,
          
          playerVars: {
            'playsinline': 1,
             'autoplay':1,
             mute:1,
             disablekb:1,
          },
          events: {
           
            'onReady': initialize,
            
          }
        });
      }

     
     

      function initialize()
      {
        
       updateTimerDisplay();

        
         if(player2)
         {
          updateTimerDisplay2();
          stopVideo(player2)
         }
         if(player3)
         {
          updateTimerDisplay3();
          stopVideo(player3)
         }
         if(player4)
         {
          updateTimerDisplay4();
          stopVideo(player4)
         }
 
         let time_update_interval=0;
        clearInterval(time_update_interval);
        time_update_interval = setInterval(function () {
         updateTimerDisplay();
         if(player2)
         {
          updateTimerDisplay2();
         }
         if(player3)
         {
          updateTimerDisplay3();
         }
         if(player4)
         {
          updateTimerDisplay4();
         }

        
         }, 1000)
      }
var executed = false;
function updateTimerDisplay(){
    

   $('#current-time1').text(formatTime(player1.getCurrentTime() ));
    $('#duration1').text(formatTime( player1.getDuration() ));
   
    if(player1.getCurrentTime() > (player1.getDuration()/2))
    {
      
      if(executed == false)
      {
        executed = true;
            credit();
            stopVideo(player1)
            player2.playVideo()
      }
   
      
    }
}

var executed2 = false;
function updateTimerDisplay2(){
    
    $('#current-time2').text(formatTime(player2.getCurrentTime()));
    $('#duration2').text(formatTime( player2.getDuration() ));

     if(player2.getCurrentTime() > (player2.getDuration()/2))
    {
      
      if(executed2 == false)
      {
        executed2 = true;
            credit();
            player3.playVideo()
            stopVideo(player2);
      }
   
      
    }
}

var executed3 = false;
function updateTimerDisplay3(){
    
    $('#current-time3').text(formatTime(player3.getCurrentTime()));
    $('#duration3').text(formatTime( player3.getDuration() ));

    if(player3.getCurrentTime() > (player3.getDuration()/2))
    {
      
      if(executed3 == false)
      {
        executed3 = true;
            credit();
            player4.playVideo();
            stopVideo(player3);
      }
   
      
    }
}

var executed4 = false;
function updateTimerDisplay4(){
    
    $('#current-time4').text(formatTime(player4.getCurrentTime()));
    $('#duration4').text(formatTime( player4.getDuration() ));

    if(player4.getCurrentTime() > (player4.getDuration()/2))
    {
      
      if(executed4 == false)
      {
        executed4 = true;
            credit();
            player1.playVideo();
            stopVideo(player4);
      }
   
      
    }
}
function formatTime(time){
    time = Math.round(time);

    var minutes = Math.floor(time / 60),
    seconds = time - minutes * 60;

    seconds = seconds < 10 ? '0' + seconds : seconds;

    return minutes + ":" + seconds;
}

      function stopVideo(player) {
        player.stopVideo();
      }
      
    </script>


<script type="text/javascript">
  function credit()
  {

    $.ajax({
       
        url:'/earn/credits',
        type:'json',
        method:'POST',
        data:{

          "_token": $('#csrf-token')[0].content ,
        }
    }).done(function(res)
    {

   alert(res)
    });

  }
</script>


@endsection

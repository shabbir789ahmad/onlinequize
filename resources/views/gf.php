<div class="container-fluid">
    <div class="row ">
        @foreach($results->items as $key =>$result)
        
        <div class="col-md-3">
          
            <div class="card shadow" >
              <div class="card-body">
                <img src="{{ $result->snippet->thumbnails->default->url }}" width="100%" height="200rem"> 
                <h4 class="mt-3">{{ \Illuminate\Support\Str::limit($result->snippet->title, $limit = 50, $end = ' ...') }}</h4>   
             </div>
            </div> 
        </div>
     <p id="ChannelId">{{$item->snippet->channelId}}</p>
        @endforeach
    </div>
</div>



@extends('master.master')

@section('content')
<div class="container-fluid mt-3 py-3 mb-3" style="display:flex;justify-content: space-between;background: #E86209;">
   
   <div class="heding">
      <h2 class="fw-bold text-light">Watch Our Videos</h2>
  </div>
   <div class=" " id="block">
     <button id="subscribe" onclick="authenticate().then(loadClient)" class="btn btn-dark btn-block">Subscribe</button>
   </div>
</div>
   

<div class="container-fluid">
    <div class="row ">
        <div class="col-md-8 border">
         @foreach($results->items as $item)
         @if($loop->first)
            <div id="player" data-id="{{$item->id->videoId}}"></div>
            <p ><span id="current-time"></span> <span id="duration" class="float-end"></span></p>
            <input type="range" id="progress-bar" value="0">
     @endif
         @endforeach 
            </div>
            <div class="col-md-4" style="height:34rem; overflow: auto;">
               <h5 class="fw-bold">More Videos</h5>
              @foreach($results->items as $item)
               <div class="row mt-3">
                <div class="col-md-5">
                 <img src="{{$item->snippet->thumbnails->default->url}}" width="100%" height="110rem">
                </div>
                <div class="col-md-7">
                 <h6>{{$item->snippet->title}}</h6>
                 <p>{{$item->snippet->channelTitle}}</p>
                </div>
               </div>
               @endforeach                   
            </div>
    </div>
  
</div>


 <script>
      
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      
      let player, player2, player3, player4;
      function onYouTubeIframeAPIReady() {

        let id='';
        let videoId='';
         id= document.getElementById('player');
         videoId=id.getAttribute('data-id');
         player= createVideo(id,videoId)

        // id= document.getElementById('player2');
        // if(id)
        // {

        //  videoId=id.getAttribute('data-id');
        //  player2= createVideo(id,videoId)
        // }
       
      
      // id= document.getElementById('player3');
      //   if(id)
      //   {

      //    videoId=id.getAttribute('data-id');
      //    player3= createVideo(id,videoId)
      //   }

      //   id= document.getElementById('player4');
      //   if(id)
      //   {

      //    videoId=id.getAttribute('data-id');
      //    player4= createVideo(id,videoId)
      //   }
       

      }

      function createVideo(id,videoId)
      {
     
       return new YT.Player(id, {
          height: '500',
          width: '920',
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
       updateProgressBar();
        
         // if(player2)
         // {
         //  updateTimerDisplay2();
         //  stopVideo(player2)
         // }
         // if(player3)
         // {
         //  updateTimerDisplay3();
         //  stopVideo(player3)
         // }
         // if(player4)
         // {
         //  updateTimerDisplay4();
         //  stopVideo(player4)
         // }
 
         let time_update_interval=0;
        clearInterval(time_update_interval);
        time_update_interval = setInterval(function () {
         updateTimerDisplay();
         updateProgressBar();
         // if(player2)
         // {
         //  updateTimerDisplay2();
         // }
         // if(player3)
         // {
         //  updateTimerDisplay3();
         // }
         // if(player4)
         // {
         //  updateTimerDisplay4();
         // }

        
         }, 1000)
      }
var executed = false;
function updateTimerDisplay(){
    

   $('#current-time').text(formatTime(player.getCurrentTime() ));
    $('#duration').text(formatTime( player.getDuration() ));
   let time=player.getCurrentTime()*1000;
   let duration=player.getDuration()*1000;
   
    if(duration < 60000)
    {
     
      if(time >= (duration-1000))
      {
        if(executed == false)
      {
        executed = true;
            credit();
            stopVideo(player)
            // player2.playVideo()
      }
      }
    }else
    {
      if(time > 60000)
    {
      
      if(executed == false)
      {
        executed = true;
            credit();
            stopVideo(player)
            // player2.playVideo()
      }
   
      
    }
    }
    
}

// var executed2 = false;
// function updateTimerDisplay2(){
    
//     $('#current-time2').text(formatTime(player2.getCurrentTime()));
//     $('#duration2').text(formatTime( player2.getDuration() ));

//      if(player2.getCurrentTime() > (player2.getDuration()/2))
//     {
      
//       if(executed2 == false)
//       {
//         executed2 = true;
//             credit();
//             player3.playVideo()
//             stopVideo(player2);
//       }
   
      
//     }
// }

// var executed3 = false;
// function updateTimerDisplay3(){
    
//     $('#current-time3').text(formatTime(player3.getCurrentTime()));
//     $('#duration3').text(formatTime( player3.getDuration() ));

//     if(player3.getCurrentTime() > (player3.getDuration()/2))
//     {
      
//       if(executed3 == false)
//       {
//         executed3 = true;
//             credit();
//             player4.playVideo();
//             stopVideo(player3);
//       }
   
      
//     }
// }

// var executed4 = false;
// function updateTimerDisplay4(){
    
//     $('#current-time4').text(formatTime(player4.getCurrentTime()));
//     $('#duration4').text(formatTime( player4.getDuration() ));

//     if(player4.getCurrentTime() > (player4.getDuration()/2))
//     {
      
//       if(executed4 == false)
//       {
//         executed4 = true;
//             credit();
//             player1.playVideo();
//             stopVideo(player4);
//       }
   
      
//     }
// }

function updateProgressBar(){
   
    $('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);
}
function formatTime(time){
    time = Math.round(time);

    var minutes = Math.floor(time / 60),
    seconds = time - minutes * 60;

    seconds = seconds < 10 ? '0' + seconds : seconds;

    return minutes + ":" + seconds;
}

      // function stopVideo(player) {
      //   player.stopVideo();
      // }
      
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

   myFunction(res)
    });

  }
</script>


@endsection

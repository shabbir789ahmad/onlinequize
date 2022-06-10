@extends('master.master')

@section('content')
<div class="container-fluid mt-3 py-3 mb-3" style="display:flex;justify-content: space-between;background: #E86209;">
   
   <div class="heding">
      <h2 class="fw-bold text-light">Watch Videos </h2>
  </div>
  <div class="heding">
      <h2 class="fw-bold text-light">Total Lifeline: <span class="text-dark" id="lifeline">@if($lifeline) {{$lifeline['lifeline']}} @else 0 @endif</span></h2>
  </div>
   <div class=" " id="block">
     <button id="subscribe" onclick="authenticate().then(loadClient)" class="btn btn-dark btn-block">Subscribe</button>
   </div>
</div>
   

<div class="container-fluid">
    <div class="row ">

        <div class="col-md-8 ">
            <input type="range" id="progress-bar" class="slider" value="0">

         @foreach($results->items as $item)
         @if($loop->first)
            <div id="player" data-id="{{$item->id->videoId}}"></div>
            <p ><span id="current-time"></span> <span id="duration" class="float-end"></span></p>
           
     @endif
         @endforeach 
            </div>
            <div class="col-md-4" style="height:34rem; overflow: auto;">
               <h5 class="fw-bold">More Videos</h5>
               <script type="text/javascript">
                  let videoIds=[]; let i=0;</script>
              @foreach($results->items as $item)
              <script type="text/javascript">
                  
                 videoIds[i++]="{{$item->id->videoId}}";
                  
              </script>
               <div class="row mt-3 more_videos" data-id="{{$item->id->videoId}}">
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

      
      let player;
      let time_update_interval=0;
      function onYouTubeIframeAPIReady()
       {
         let videoId='';
         id=document.getElementById('player')
         videoId=id.getAttribute('data-id');
         player= createVideo(videoId)

       }

      function createVideo(videoId)
       {
     
         return new YT.Player('player', {

            height: '500',
            width: '920',
            videoId: videoId,
           
            playerVars: 
            {
               'playsinline': 1,
               'autoplay':1,
               'mute':1,
               disablekb:1,
            },
           events: 
           {
           
            'onReady': initialize,
      
           }
        });
       }

     
      function initialize()
      {
         updateTimerDisplay();
         updateProgressBar();
        
        
         clearInterval(time_update_interval);
         time_update_interval = setInterval(function ()
          {
            updateTimerDisplay();
            updateProgressBar();
          
          }, 1000)
      }

    var executed = false;
    var k=0;
    function updateTimerDisplay()
    {
      $('#current-time')
      .text(formatTime(player.getCurrentTime() ));

      $('#duration')
      .text(formatTime( player.getDuration() ));
      
      let time=player.getCurrentTime()*1000;
      let duration=player.getDuration()*1000;
   
      if(duration < 60000)
      {
     
        if(time >= (duration-1000))
        {
          
              allvideosId(k++)
              
            
        }
      
      }else
      {

        if(time > 60000)
        {
             // player.stopVideo();
             allvideosId(k++)
           
        }
      }
    }



   function updateProgressBar()
   {
     if(player.getDuration() > 60)
     {
      $('#progress-bar').val((player.getCurrentTime() / 60) * 100);
     }else
     {
      $('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);
     }
     
   }


   function formatTime(time)
   {
      time = Math.round(time);
      var minutes = Math.floor(time / 60),
      seconds = time - minutes * 60;

      seconds = seconds < 10 ? '0' + seconds : seconds;

      return minutes + ":" + seconds;
    }
    
 </script>

  <script type="text/javascript">
   
    function credit()
    {

       $.ajax({
       
          url:'/lifeline/store',
          type:'json',
          method:'POST',
          data:{

             "_token": $('#csrf-token')[0].content ,
          }
       }).done(function(res)
       {

         clearInterval(time_update_interval)
         myFunction(res.success);
         let lifeline=res.lifeline;
         alert(lifeline.lifeline)
         document.getElementById('lifeline').html=lifeline.lifeline;
         
        
       });
    }
  </script>


@endsection
@section('script')

  <script type="text/javascript">
     var count=0;  
    $(document).on('click','.more_videos',function()
    {

       videoId=$(this).data('id');
       player.loadVideoById(videoId)
        initialize()
    
    });
    
   // delete first video id from array
    videoIds.shift()

    //call this function to automaticaly play videos
    
    function allvideosId(k)
    { 
        count++;

        if(count===5)
        {
           credit(); 
        }
        
        player.loadVideoById(videoIds[k])
        initialize()
      
    }

  </script>
@endsection

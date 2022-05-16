@extends('master.master')

@section('content')
<div class="container-fluid mt-3 mb-3" style="display:flex;justify-content: space-between;">
  <div class="heding ">
      <h1>Watch Our Videos</h1>
       
  </div>
  <div class=" " id="block">
  <button id="subscribe" onclick="authenticate().then(loadClient)" class="btn btn-danger btn-block">Subscribe</button>
</div>
          </div>
  
</div>
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
            @if($loop->first)
            <input type="text" name="" id="channelId" value="{{$result->snippet->channelId}}">
            @endif
        </div>
    
        @endforeach
    </div>
</div>




  <script src="https://apis.google.com/js/api.js"></script>
<script>
  

 var id ;
  function authenticate() {
    return gapi.auth2
      .getAuthInstance()
      .signIn({ scope: "https://www.googleapis.com/auth/youtube.force-ssl" })
      .then(
        function() {
          console.log("Sign-in successful");
         
        },
        function(err) {
          console.error("Error signing in", err);
        }
      );
  }

  
  function loadClient() {
    gapi.client.setApiKey("AIzaSyBHzsW_9GJFsc1IPghMJqc0LJfwYfYyQnY");
    return gapi.client
      .load("https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest")
      .then(
        function() {
          console.log("GAPI client loaded for API");
          subscribe();
        },
        function(err) {
          console.error("Error loading GAPI client for API", err);
        }
      );
  }

  function subscribe() {
    var channelId = document.getElementById("channelId").value;
    return gapi.client.youtube.subscriptions
      .insert({
        part: "snippet",
        resource: {
          snippet: {
            resourceId: {
              kind: "youtube#channel",
              channelId: channelId
            }
          }
        }
      })
      .then(
        function(response) {
          // Handle the results here (response.result has the parsed body).
          console.log("Response", response);
          id = response.result.id

          let result = `
             Watch 5 videos to get one lifeline
          `;
          document.getElementById("block").innerHTML = result;
        },
        function(err) {
          console.error("Execute error", err);
        }
      );
  }

  

  function unsubscribe(){
    document.getElementById('result').innerHTML = ''
    var channelId = document.getElementById('channelId').value
    return gapi.client.youtube.subscriptions.delete({
        "id":id
    })
        .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response);

                let result = `
          <h3>You are successfully unsubscribed to Channel</h3>
          <button onclick="subscribe()" class="btn btn-danger">Subscribe</button>
          `;
          document.getElementById("result").innerHTML = result;

              },
        function(err) { console.error("Execute error", err); });
  }

  gapi.load("client:auth2", function() {
   

    window.gapi.client
        .init({
          clientId:'649322921404-jd28nq4m1d7bc46loatlr0nv3iahd204.apps.googleusercontent.com',
          scope: "email",
          plugin_name:'laravel youtube'
        })
  });



</script>






@endsection

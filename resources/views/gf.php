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

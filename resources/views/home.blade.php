@extends('master.master')
@section('content')

<header>
   <img src="{{asset('/img/photos/Untitled design.png')}}" width="100%" height="100%"> 
  <div class="contant">
   <h2>Play & Earn Exciting Prices</h2>
   <h3><i class="fas fa-headset"></i>Enjoy, Happiness..</h3>

  </div>
   
</header>
<div class="container-fluid mt-4">
  <div class="heding">
      <h2 class="fw-bold">All Game Show</h2>
  </div>
</div>
<div class="container-fluid mb-5">
    <div class="row ">
        @foreach($quizes as $quiz)
        
        <div class="col-md-3 col-6 ">
          <a href="{{route('game.show',['id'=>$quiz['id']])}}" style="text-decoration: none; color: #000;" >
            <div class="card shadow" >
              <div class="card-body">
                <img src="{{asset('uploads/brand/' .$quiz['quize_images'])}}" width="100%" class="game_image" alt="game show image"> 
                <h4 class="mt-3 fw-bold">{{$quiz['quize_name']}}</h4>   
             </div>
            </div>   </a>
        </div>
     
        @endforeach
    </div>
</div>
@endsection

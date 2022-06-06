@extends('master.master')

@section('content')

<div class="container-fluid mt-3" >
  <div class="heding">
      <h2 class="fw-bold">All Game Show</h2>
  </div>
</div>
<div class="container-fluid">
    <div class="row ">
        @foreach($quizes as $quiz)
        
        <div class="col-md-3">
          <a href="{{route('game.show',['id'=>$quiz['id']])}}" style="text-decoration: none; color: #000;" >
            <div class="card shadow" >
              <div class="card-body">
                <img src="{{asset('uploads/brand/' .$quiz['quize_images'])}}" width="100%" height="260rem"> 
                <h4 class="mt-3 fw-bold">{{$quiz['quize_name']}}</h4>    
             </div>
            </div>   </a>
        </div>
     
        @endforeach
    </div>
</div>
@endsection

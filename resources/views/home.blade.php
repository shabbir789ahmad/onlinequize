@extends('master.master')

@section('content')
<div class="container-fluid">
  <div class="heding">
      <h1>All Game Show</h1>
  </div>
</div>
<div class="container-fluid">
    <div class="row ">
        @foreach($quizes as $quiz)
        
        <div class="col-md-4">
          <a href="{{route('game.show',['id'=>$quiz['id']])}}" style="text-decoration: none; color: #000;" >
            <div class="card shadow" >
              <div class="card-body">
                <img src="{{asset('uploads/brand/' .$quiz['quize_images'])}}" width="100%" height="400rem"> 
                <h4 class="mt-3">{{ucfirst($quiz['quize_name'])}}</h4>   
             </div>
            </div>   </a>
        </div>
     
        @endforeach
    </div>
</div>
@endsection

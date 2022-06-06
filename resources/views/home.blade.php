@extends('master.master')
@section('content')
<style type="text/css">
  header{
    height: 35rem;
  }
  header img{
    position:  relative;
    top: 0;
    left: 0;

  }
  .contant{
    position: absolute;
    left: 8%;
    right: 0;
    top: 25%;
    width: 45%;
    height: 20rem;
    background: #E86209;
    text-align: center;
  }
  .contant h2{
    margin-top: 10%;
    color: #fff;
    font-weight: 900;
    font-size: 5vw;
  }
</style>
<header>
  <img src="{{asset('/img/photos/tamara-gak-0f4dfrNdSB0-unsplash.jpg')}}" width="100%" height="100%">
  <div class="contant">
   <h2>Play And Earn Exciting Prices</h2>
  </div>
</header>
<div class="container-fluid mt-4">
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

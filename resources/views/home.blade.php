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
    left: 18%;
    right: 0;
    top: 17%;
    width: 40%;
    height: 20rem;
   
    text-align: center;
  }
  .contant h2{
    margin-top: 10%;
    color: #fff;
    font-weight: 700;
    font-size: 5vw;
  }
  .contant h3{
   
    color: #E86209;
    font-weight: 700;
    font-size: 3vw;
  }
   header{
    background-color: #09192C;
  }

</style>
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

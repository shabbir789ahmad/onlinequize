@extends('master.master')
@section('content')
<i class="fa-solid fa-align-right close_icon  fa-2x border border-dark" id="sid"></i>
<div class="main_content">
  
  <div class=" sidebar1 sidebar" id="sidebar">
    <i class="fa-solid fa-xmark close_icon text-light fa-2x" id="close_icon"></i>
    <div class="product1" >
      <h4>{{Auth::user()->name}}</h4>
    </div>
   <!-- <p class="text-secondary p-3 pt-0 mb-1 pb-0">*Payments</p> -->
    <div class="product2 @if(request()->is('payouts')) active_bar @endif" >
      <a href="{{route('payouts')}}"><i class="fa-solid fa-circle-dollar-to-slot mr-4"></i> Payments </a>
    </div>
    <div class="product2" >
      <a href="#"><i class="fa-solid fa-circle-dollar-to-slot mr-4"></i> Payments Setting</a>
    </div>

    <div class="product2" >
      <a href="#">  </a>
    </div>
    <span class="text-secondary p-4 pb-0 tag">Score & Games  </span>
    <div class="product2" >
      <a href="#"><i class="fa-solid fa-circle-dollar-to-slot mr-4"></i>   Games</a>
    </div>


    
    <div class="product2" >
      <a href="#"><i class="fa-solid fa-circle-dollar-to-slot mr-4"></i> Help</a>
    </div>
    <div class="product2" >
      <a href="#"><i class="fa-solid fa-circle-dollar-to-slot mr-4"></i> Profile</a>
    </div>
    <div class="product2" >
      <a href="#"><i class="fa-solid fa-circle-dollar-to-slot mr-4"></i> Setting</a>
    </div>
    
    

  </div>
  <div class="main mt-5">
 <div class="row border-bottom border-dark pb-5">
   <div class="col-md-10 ">
    <h2 class="fw-bold ml-5">Payouts</h2>
   </div>
   <div class="col-md-2">
    <a href="#" class="btn buttons"><i class="fa-solid fa-gear"></i> Setting</a>
   </div>
 </div>

 <div class="row border-bottom border-dark pb-5">
  
  <div class="col-md-3 ">
    <div class="card_style">
    <h6 class="fw-bold ">Balance</h6>
    <p>Rs {{$balance['credit'] / 100}}</p>
    </div>
  </div>
  <div class="col-md-3 ">
    <div class="card_style">
    <h6 class="fw-bold ">Past 7 Days</h6>
    <p>Rs 12</p>
    </div>
  </div>
  <div class="col-md-3 ">
    <div class="card_style">
    <h6 class="fw-bold ">Withdrawn</h6>
    <p>Rs  {{$balance['earned'] / 100}}</p>
    </div>
  </div>
  <div class="col-md-3 ">
    <div class="card_style">
    <h6 class="fw-bold ">Total Earning</h6>
    <p>Rs  {{($balance['earned'] + $balance['credit'] )/ 100}}</p>
    </div>
  </div>

  

</div>

  <div class="get_paid">
   <img src="{{asset('img/photos/towfiqu-barbhuiya-xkArbdUcUeE-unsplash.jpg')}}" width="100%">

   <div class="pay_text">
     <h6>Let's get you paid.</h6>
     <p>Reach a balance of at least Rs 10 to be paid out for your Account.</p>
     <a href="#" class="btn buttons mt-4"><i class="fa-solid fa-money-check-dollar"></i> Payment</a>
   </div>
  </div>
</div>
 </div>

 <script type="text/javascript">
   let sid=document.getElementById('sid');
   let sidebar=document.getElementById('sidebar');
   sid.addEventListener('click',function(){
    sidebar.classList.add("sidebars");
    sidebar.classList.remove("sidebar");
    this.style.display="none"
   });

   let close_icon=document.getElementById('close_icon');
   close_icon.addEventListener('click',function(){
   

    sidebar.classList.add("sidebar");
    sidebar.classList.remove("sidebars");
    sid.style.display="block"
   });
 </script>

@endsection

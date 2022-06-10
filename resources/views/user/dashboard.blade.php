@extends('master.master')
@section('content')



<div class="container mb-5">
   <h3 class="product-name mt-5">Your Acount</h3>
   <div class="row">
    <div class="col-md-4 col-12">
    <a href="{{route('payouts')}}" class="links">
     <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('img/icons/order._CB660668735_.png')}}" width="25%">
          <div class="text_user ml-3">
           <h6 class="order_user">Your Earnings</h6>
           <p class="product-detail3">Detail,withdraw or Earn</p>
          </div>
        </div>
      </div>
     </div>
     </a>
    </div>
    <div class="col-md-4 col-12">
    <a href="" class="links"> <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('img/icons/security._CB659600413_.png')}}" width="25%">
          <div class="text_user ml-3 ">
           <h6 class="order_user">Login & Security</h6>
           <p class="product-detail3 ">Edit Name,Mobile,Password</p>
          </div>
        </div>
      </div>
     </div>
     </a>
    </div>
    <div class="col-md-4 col-12">
   <a href="" class="links">
     <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('img/icons/account._CB660668669_.png')}}" width="25%">
          <div class="text_user ml-3">
           <h6 class="order_user">Your Profile</h6>
           <p class="product-detail3">Manage Add or remove Profile</p>
          </div>
        </div>
      </div>
     </div>
     </a>
    </div>
    <div class="col-md-4 col-12 mt-4">
    <a href="" class="links">
     <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('img/icons/9_messages._CB654640573_.jpg')}}" width="25%">
          <div class="text_user ml-3">
           <h6 class="order_user">Your Message</h6>
           <p class="product-detail3">View All Messages</p>
          </div>
        </div>
      </div>
     </div>
    </a>
    </div>
    <div class="col-md-4 col-12 mt-4">
   <a href="" class="links">
     <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('img/icons/10_archived_orders._CB654640573_.png')}}" width="25%">
          <div class="text_user ml-3">
           <h6 class="order_user">Your Wishlist</h6>
           <p class="product-detail3">View,Manage Your Wishlist</p>
          </div>
        </div>
      </div>
     </div>
     </a>
    </div>
    <div class="col-md-4 col-12 mt-4">
   <a href="" class="links"> 
     <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('img/icons/order._CB660668735_.png')}}" width="25%">
          <div class="text_user  ml-3">
           <h6 class="order_user">Your Cart</h6>
           <p class="product-detail3">track,return or buy Again</p>
          </div>
        </div>
      </div>
     </div>
    </a>
    </div>
   </div>
</div>
@endsection

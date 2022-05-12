@extends('admin.master')
@section('content')


  <div class="container-fluid" >
    
      <div class="row mt-5 mb-5">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4" >
              <h5 class="text-center fw-bold mt-5">Log in to your account</h5>

              <hr>
              
                     <button class="btn-info shadow p-1 form_text btn-block btn mt-3 py-3"><i class="fab fa-facebook-f"></i> sign in with facebook</button>
                     <button class="btn-info shadow p-1 form_text btn-block btn mt-3 py-3"><i class="fab fa-twitter"></i> sign in with twitter</button>
                     <button class=" shadow p-1 form_text btn-block btn mt-3 py-3"><i class="fab fa-google "></i> sign in with google</button>

                     <p class="text-center mt-3">OR</p>
                   <form action="{{route('vendor.authenticate')}}" method="POST">
                    @csrf
                    <div class="form-group text-light mt-3">
                    
                       <input type="email" name="vendor_email" class="form-control  py-4 border-secondary shadow" placeholder="Enter your Email">
                    </div>
                    <div class="form-group text-light">
                      
                       <input type="password" name="password" class="form-control  py-4 border-secondary shadow" placeholder="Enter your Password">
                    </div>

                    <button class="btn btn-lg btn-block login_button" >Log in</button>
                   </form>
                   @if(session()->has('adminerror'))
            <div class="alert alert-danger">
           <strong>Error!</strong>{{session()->get('adminerror')}}
            </div>
            @endif
                   <p class=" mt-3 form_text text-center">FORGOT PASSWORD</p>
                 <p class="text-center mt-3 form_text">Do not have an account? <a href="#">Sign in</a></p>

              
        </div>
        <div class="col-md-4">
            
        </div>
      </div>

 
  </div>

@endsection


@extends('admin.master')
@section('content')
<div class="grid">
 <div class="container">
   <form method="POST" action="{{route('login') }}">
    @csrf
     <div class="title">Login</div>

       @if(session()->has('message'))
            <div class="alert alert-danger">
           <strong>Error!</strong>{{session()->get('message')}}
            </div>
           
            @endif

            <a href="{{ url('auth/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                </a>

                
       <div class="input-box underline">
          <input  id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocu placeholder="Enter Your Email" >
          
          <div class="underline"></div>
          
          @error('email')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="input-box">
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="underline"></div>
        </div>

         @error('password')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror

        <div class="row mt-4">
                            <div class="col-md-6 ">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 ">
                                 @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="">
                                        {{ __('Forgot  Password?') }}
                                    </a>
                                @endif

                            </div>
                        </div>

        <div class="input-box button">
          <input type="submit" name="" value="Login">
        </div>
        <label class="form-check-label" >
            Create New Account By<a href="{{route('register')}}"> Signin</a>
                                    </label>
        
      </form>



        
     
    </div>
 </div>


@endsection


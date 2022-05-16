@extends('admin.master')
@section('content')
<div class="grid">
 <div class="container">
   <form method="POST" action="{{route('register') }}">
    @csrf
     <div class="title">Register</div>

       <div class="input-box underline">
          <input  id="name" type="name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocu placeholder="Enter Your Name" >
          
          <div class="underline"></div>
          
          @error('name')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

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
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
          <div class="underline"></div>
        </div>

         @error('password')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror

         <div class="input-box">
          <input id="password" type="password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Conform Password">
          <div class="underline"></div>
        </div>

         @error('password')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror



        <div class="input-box button">
          <input type="submit" name="" value="Login">
        </div>
        <label class="form-check-label" >
            Sign In To Your Account<a href="{{route('login')}}"> Login</a>
                                    </label>
        
      </form>



        
     
    </div>
 </div>


@endsection



     
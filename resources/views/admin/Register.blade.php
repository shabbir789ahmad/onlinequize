@extends('home')

@section('content')
<div class="container  w-50 mt-5 border p-5 shadow mb-4">
    
  <form method="POST" action="{{ route('new/register') }}" enctype="multipart/form-data">
                        @csrf


  <input id="name" type="text" class="form-control mt-3 py-3 @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
              </span>
                 @enderror
                

    <input id="email" type="email" class="form-control mt-3 py-3 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
  @error('email')
   <span class="invalid-feedback" role="alert">
     <strong>{{ $message }}</strong>
                </span>
                                @enderror
          
    <input id="phone" type="number" class="form-control mt-3 py-3 @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') }}" required autocomplete="phone">
  @error('phone')
   <span class="invalid-feedback" role="alert">
     <strong>{{ $message }}</strong>
                </span>
                                @enderror
                        
                  
          <input id="password" type="password" placeholder="Password" class="form-control mt-3 py-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

           @error('password')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
          @enderror
                     

 <input id="password-confirm" type="password" placeholder="Conform Password" class="form-control mt-3 py-3" name="password_confirmation" required autocomplete="new-password">
     
     <input id="image" type="file" placeholder="Choose Image" class="form-control mt-3 " name="image" required autocomplete="profile">                     

                       
    <button type="submit" class="btn btn-check py-3 text-light btn-block rounded mt-3">
                                    {{ __('Register') }}
                                </button>
                          
                    </form>
               
</div>
@endsection


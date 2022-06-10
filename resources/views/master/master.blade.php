<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/53bfee5bd7.js" crossorigin="anonymous"></script>
     <meta name="google-signin-client_id" content="663104268892-0l4gc005tuied5d6o77v12c5kqmrbv02.apps.googleusercontent.com">
   <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/user.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/game.css')}}">
<!-- scrf token -->
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}"> 


<style type="text/css">
  #snackbar {
  visibility: hidden; 
  width: 25%;
  height: 10rem;
  margin-left: -125px; 
  background-color: #E86209; 
  color: #fff; 
  text-align: center; 
  border-radius: 2px; 
  padding: 16px; 
  position: fixed; 
  z-index: 1; 
  left: 0%;
  right: 0%;
  margin-left: auto;
  margin-right: auto;
  top: 50px; 
}


#snackbar.show {
  visibility: visible; 
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}


@-webkit-keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 50px; opacity: 1;}
}

@keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 50px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {top: 50px; opacity: 1;}
  to {top: 0; opacity: 0;}
}

@keyframes fadeout {
  from {top: 50px; opacity: 1;}
  to {top: 0; opacity: 0;}
}
</style>
  </head>
  <body>
<div id="snackbar" class="text-center">
  <img src="{{asset('img/avatars/salary.png')}}" width="15%">
  <h5 class="mt-1 fw-bold">Congratulations</h5>
  <p id="text" class="mt-3"></p>
</div>

    {{View::make('master.header')}}
       @yield('content')
    {{View::make('master.footer')}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
      var baseURL = "{{ url("") }}" + "/";
</script>
<script src="http://benalman.com/code/projects/jquery-throttle-debounce/jquery.ba-throttle-debounce.js"></script>
  

  @section('script')
@show



<script>
 
 function myFunction(res) {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");
  var text = document.getElementById("text");

  // Add the "show" class to DIV
  x.className = "show";
  text.innerHTML = res;

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>


  </body>
</html>



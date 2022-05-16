<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/53bfee5bd7.js" crossorigin="anonymous"></script>
    
   <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">


  </head>
  <body>

    {{View::make('master.header')}}
       @yield('content')
    {{View::make('master.footer')}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
      var baseURL = "{{ url("") }}" + "/";
</script>
<script src="http://benalman.com/code/projects/jquery-throttle-debounce/jquery.ba-throttle-debounce.js"></script>
  
<script type="text/javascript"></script>
  @section('script')
@show
  </body>
</html>



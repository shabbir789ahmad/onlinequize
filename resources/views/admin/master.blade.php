<!DOCTYPE html>
<html lang="en">
<head>
	
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />



<title></title>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
.grid{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  width: 100%;
  place-items: center;
  background: linear-gradient(to right, #1e548f 0%, #154578 100%);
}
::selection{
  background: #ff80bf;

}
.container{
  background: #fff;
  max-width: 400px;
  width: 100%;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
}
.container form .title{
  font-size: 30px;
  font-weight: 600;
  margin: 20px 0 10px 0;
  position: relative;
}
.container form .title:before{
  content: '';
  position: absolute;
  height: 4px;
  width: 33px;
  left: 0px;
  bottom: 3px;
  border-radius: 5px;
  background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
}
.container form .input-box{
  width: 100%;
  height: 45px;
  margin-top: 25px;
  position: relative;
}
.container form .input-box input{
  width: 100%;
  height: 100%;
  outline: none;
  font-size: 16px;
  border: none;
}
.container form .underline::before{
  content: '';
  position: absolute;
  height: 2px;
  width: 100%;
  background: #ccc;
  left: 0;
  bottom: 0;
}
.container form .underline::after{
  content: '';
  position: absolute;
  height: 2px;
  width: 100%;
   background: linear-gradient(to right, #1e548f 0%, #154578 100%);
  left: 0;
  bottom: 0;
  transform: scaleX(0);
  transform-origin: left;
  transition: all 0.3s ease;
}
.container form .input-box input:focus ~ .underline::after,
.container form .input-box input:valid ~ .underline::after{
  transform: scaleX(1);
  transform-origin: left;
}
.container form .button{
  margin: 40px 0 20px 0;
}
.container .input-box input[type="submit"]{
    background: linear-gradient(to right, #1e548f 0%, #154578 100%);
  font-size: 17px;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.container .input-box input[type="submit"]:hover{
  letter-spacing: 1px;
    background: linear-gradient(to left, #1e548f 0%, #154578 100%);
}

/*.container .facebook a,*/
 .twitter a{
  display: block;
  height: 45px;
  width: 100%;
  font-size: 15px;
  text-decoration: none;
  padding-left: 20px;
  padding-right: 20px;
  line-height: 45px;
  color: #fff;
  border-radius: 5px;
  transition: all 0.3s ease;
}

/*.container .facebook i,*/
 .twitter i{
  padding-right: 12px;
  font-size: 20px;
}
 .twitter a{
  background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
  margin: 20px 0 15px 0;
}
 .twitter a:hover{
  background: linear-gradient(to left, #99004d 0%, #ff0080 100%);
  margin: 20px 0 15px 0;
}


</style>
</head>
<body style="background-color:#E9ECEF">


  @yield('content')






 
 <script src="https://code.jquery.com/jquery-3.4.0.min.js" 
  integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6" 
  crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script type="text/javascript">
   $('#user_form').click(function(){
    
    $(this).prop('disabled',true)
    $('#vendor_form').prop('disabled',false)
    $('#user').css('display','block')
    $('#vendor').css('display','none')
   })
   $('#vendor_form').click(function(){
    
    $(this).prop('disabled',true)
    $('#user_form').prop('disabled',false)
    $('#user').css('display','none')
    $('#vendor').css('display','block')
   })
 </script>


</body>
</html>

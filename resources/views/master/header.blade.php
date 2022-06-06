
    <nav class="navbar_list" style="overflow:hidden;">
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars fa-lg"></i>
      </label>
      <label class="logo"><a href="{{url('/')}}" class="link text-light">Quiz<span>App</span></a></label>

      <ul class="ul mb-0">
        <li class="li"><a  class="  {{ (request()->is('/')) ? 'active' : '' }}"  href="{{url('/')}}">Home</a></li>
        <li class="li"><a href="{{route('all.shows')}}"   class="  {{ (request()->is('all/shows')) ? 'active' : '' }}">Games</a></li>
        <li class="li"><a href="{{route('lifeline.index')}}" class="  {{ (request()->is('lifeline')) ? 'active' : '' }}">Earn Money</a></li>
        
        <li class="li"><a href="{{route('lifeline.index')}}" class="  {{ (request()->is('lifeline')) ? 'active' : '' }}">Live Shows</a></li>
      </ul>

      <!-- <button class="btn btn_upload_adds"><i class="fa-solid fa-plusd"></i>Post Adds</button> -->
             @guest
          @if (Route::has('login'))
          <a class="btn_upload_login btn float-right" href="{{ route('login') }}">{{ __('Login') }}</a>
          @endif
          @else
          
           
          <div class="btn-group user_img">
            

    <!-- Default dropstart button -->
<div class="btn-group dropstart">
<img src="{{asset('img/avatars/download.png')}}" width="100%" class=" dropdown-toggle user_image" data-bs-toggle="dropdown" aria-expanded="false">
  <ul class="dropdown-menu">
     <li><a class="dropdown-item" href="{{route('user.dashboard')}}">Dashboard</a></li>
             <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out
              </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-hidden">
               @csrf
             </form></li>
  </ul>
</div>



          </div>
          
     @endguest

 

    

    </nav>
 

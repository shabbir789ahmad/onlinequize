<nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
	<a class="sidebar-brand" href="dashboard">
        <span class="align-middle">ShabbirAhmad</span>
     </a>

	<ul class="sidebar-nav">
	   <li class="sidebar-header">
		   Pages
	   </li>

	   <li class="sidebar-item @if(request()->is('admin/dashboard')) active  @endif">
		   <a class="sidebar-link "  href="{{route('admin.dashboard')}}">
         <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
       </a>
	   </li>
    
    <li class="sidebar-item @if(request()->is('admin/quiz')) active  @endif">
		   <a class="sidebar-link" href="{{route('quiz.index')}}">
              <i class="align-middle me-2" data-feather="film"></i> <span class="align-middle">Create Quiz</span>
            </a>
		</li>
		<li class="sidebar-item">
		   <a class="sidebar-link" href="{{route('question.index')}}">
		   	
         <i class="align-middle me-2" data-feather="copy"></i> <span class="align-middle">Question Bank</span>
       </a>
		</li>
    
    

   

		



					<!-- <li class="sidebar-item">
						<a class="sidebar-link" href="pages-blank.html">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
            </a>
					</li>

					<li class="sidebar-header">
						Tools & Components
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-buttons.html">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-forms.html">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-cards.html">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-typography.html">
              <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{Route('icon')}}">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
            </a>
					</li> -->

					<!-- <li class="sidebar-header">
						Plugins & Addons
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.html">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.html">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
            </a>
					</li> -->
				</ul>

				
			</div>
		</nav>
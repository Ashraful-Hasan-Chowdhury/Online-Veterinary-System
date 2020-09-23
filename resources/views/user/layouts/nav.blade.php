<header id="header" id="home">
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between f-flex">
				      <div id="logo">
				        {{-- <a href="index.html"><img src="{{ asset('public/user/img/logo.png') }}" alt="" title="" /></a> --}}
				        <h3 class="text-light">Online Veterinary</h3>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a style="font-size: 15px;" href="{{ url('/') }}">হোম</a></li>
				          <li><a style="font-size: 15px;" href="{{ route('hospitals') }}">পশু হাসপাতাল</a></li>
				          <li><a style="font-size: 15px;" href="{{ route('pharmacies') }}">ফার্মেসী</a></li>
				          <li><a style="font-size: 15px;" href="{{ route('cures') }}">রোগ ও প্রতিকার</a></li>
				          @if (Auth::check())
				          
				          <li><a style="font-size: 15px;" href="{{ route('doctors') }}">পশু চিকিৎসক</a></li>
				          <li><a style="font-size: 15px;" href="{{ route('appoinments') }}">আমার সিরিয়াল সমূহ</a></li>
				          
                <li class="nav-item"><a style="font-size: 15px;" href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">লগ আউট করুন</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              @else
              <li><a style="font-size: 15px;" href="{{ route('login') }}" class="nav-link">লগিন করুন</a></li>
            @endif
				            </ul>
				          </li>				              
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header>
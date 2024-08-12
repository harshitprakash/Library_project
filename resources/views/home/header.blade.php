  <header class="header-area header-sticky" style=>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('home.index')}}" class="active">Home</a></li>
                        <li><a href="{{route('home.explore')}}">Explore</a></li>
                        @if (Route::has('login'))
                                @auth
                                <li><a href="{{route('book.history')}}">MY History</a></li>
                                <li>
                                    <a href="{{ route('profile.show') }}" class="nav-link">
                                        <i class="fa fa-user-circle me-1"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="ml-3">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger">
                                            <i class="fa fa-sign-out me-1"></i> Logout
                                        </button>
                                    </form>
                                    </a>
                                    
                                </li>
                                    @else
                                    <li><a href="{{route('login')}}">Login</a></li>

                                         @if (Route::has('register'))
                                        <li><a href="{{route('register')}}">Register</a></li>
                                        @endif
                                @endauth
                        @endif
                    </ul> 
                    
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
                
            </div>
        </div>
    </div>
  </header>






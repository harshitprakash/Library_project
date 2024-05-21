

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky ">
    <div class="container">
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
                                <x-app-layout>
                                </x-app-layout>
                                </li>
                                    @else
                                    <li><a href="{{route('login')}}">Login</a></li>

                                         @if (Route::has('register'))
                                        <li><a href="{{route('register')}}">Register</a></li>
                                        @endif
                                @endauth
                            </nav>
                        @endif


                    </ul>   
                    <!-- <a class='menu-trigger'>
                        <span>Menu</span>
                    </a> -->
                    <!-- ***** Menu End ***** -->
            </div>
        </div>
    </div>
  </header>
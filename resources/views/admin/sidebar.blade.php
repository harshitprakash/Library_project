<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('admin/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">{{Auth::user()->name}}</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{route('admin.home')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{route('index')}}"> <i class="icon-grid"></i>Category</a></li>
                <li><a href="#dropdown" aria-expanded="true" class="dropdown-toggle" data-toggle="collapse"> <i class="icon-windows"></i>Books</a>
                   <ul id="dropdown" class="collapse list-unstyled">  
                    <li><a href="{{route('add.book')}}">Add Books</a></li>
                    <li><a href="{{route('index.book')}}">Books List</a></li>
                  </ul>
                </li>
                
                <li><a href="{{route('borrow.request')}}"> <i class="icon-logout"></i>Borrow Requests</a></li>
        </ul>
        
      </nav>
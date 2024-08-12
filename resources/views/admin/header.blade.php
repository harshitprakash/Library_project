    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <!-- Navbar Header-->
                    <a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase">
                            <strong class="text-primary">Dark</strong><strong>Admin</strong>
                        </div>
                        <div class="brand-text brand-sm">
                            <strong class="text-primary">D</strong><strong>A</strong>
                        </div>
                    </a>
                    <!-- Sidebar Toggle Btn-->
                    <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                </div>

                <div class="d-flex align-items-center">
                    <!-- Profile Link with Icon -->
                    <a href="{{ route('profile.show') }}" class="nav-link">
                        <i class="fa fa-user-circle me-1"></i> Profile
                    </a>
                    <!-- Logout Form with Icon -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="ml-3">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger">
                            <i class="fa fa-sign-out me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

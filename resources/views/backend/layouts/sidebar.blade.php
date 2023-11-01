<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link d-flex align-items-center">
        <img src="{{ '/backend/dist/img/blood1.webp' }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8; width: 50px; height: 50px;">
        <span class="brand-text text-danger ml-2"
            style="font-size: 16px; background-color: white; text-align: center;"><b>Blood Distribution<br>Decision
                Support System</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::check() && Auth::user()->user_image)
                    <img src="{{ asset('storage/' . Auth::user()->user_image) }}" class="img-circle elevation-2"
                        alt="User Image" style="height: 38px;">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block"
                    style="color: white; background-color: purple;"><b>{{ Auth::user()->name }}</b></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Admin Role Menu Items -->
                @if (Auth::user()->role == 'Admin')
                    <li class="nav-item">
                        <a href="{{ URL::to('/home') }}" class="nav-link active">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- Blood Donations Submenu -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tint" style="color: red;"></i>
                            <p>
                                Blood Donations
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/blood_donation/create') }}" class="nav-link">
                                    <i class="fas fa-plus-circle nav-icon" style="color: white;"></i>
                                    <p>Add New Donor</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/blood_donation/') }}" class="nav-link">
                                    <i class="fas fa-check-circle nav-icon" style="color: white;"></i>
                                    <p>Available Donations</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Blood Requests Submenu -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class=" nav-icon fas fa-ambulance" style="color: orange;"></i>
                            <p>Blood Requests <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/blood_requests/create') }}" class="nav-link">
                                    <i class="fas fa-plus-circle nav-icon" style="color: white;"></i>

                                    <p>Add New Request</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/blood_requests/') }}" class="nav-link">
                                    <i class="fas fa-check-circle nav-icon" style="color: white;"></i>
                                    <p>Available Requests </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Stock and Facilities -->
                    <li class="nav-item">
                        <a href="{{ URL::to('/stocks/') }}" class="nav-link">
                            <i class="nav-icon fas fa-warehouse" style="color: white;"></i>
                            <p>Stock</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('/facilities/') }}" class="nav-link">
                            <i class="nav-icon fas fa-hospital " style="color: violet;"></i>
                            <p>Facilities</p>
                        </a>
                    </li>

                    <!-- User Management Submenu -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>User Management <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/create') }}" class="nav-link">
                                    <i class="nav-icon fas fa-plus-circle" style="color: white;"></i>
                                    <p>Add User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check-circle" style="color: white;"></i>
                                    <p>User List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Blood Bank Manager Role Menu Items -->
                @if (Auth::user()->role == 'Blood Bank Manager')
                    <li class="nav-item">
                        <a href="{{ URL::to('/home') }}" class="nav-link active">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- Blood Donations Submenu -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tint" style="color: red;"></i>
                            <p>
                                Blood Donations
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/blood_donation/create') }}" class="nav-link">
                                    <i class="fas fa-plus-circle nav-icon" style="color: white;"></i>
                                    <p>Add New Donor</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/blood_donation/') }}" class="nav-link">
                                    <i class="fas fa-check-circle nav-icon" style="color: white;"></i>
                                    <p>Available Donations</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Blood Requests Submenu -->
                    <li class="nav-item">
                        <a href="{{ URL::to('/blood_requests/') }}" class="nav-link">
                            <i class=" nav-icon fas fa-ambulance" style="color: orange;"></i>
                            <p>Blood Requests</p>
                        </a>
                    </li>

                    <!-- Stock -->
                    <li class="nav-item">
                        <a href="{{ URL::to('/stocks/') }}" class="nav-link">
                            <i class="nav-icon fas fa-warehouse" style="color: white;"></i>
                            <p>Stock</p>
                        </a>
                    </li>
                @endif

                <!-- Doctor Role Menu Items -->
                @if (Auth::user()->role == 'Doctor')
                    <li class="nav-item">
                        <a href="{{ URL::to('/home') }}" class="nav-link active">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('/doctor/create') }}" class="nav-link">
                            <i class="fas fa-plus-circle nav-icon" style="color: white;"></i>
                            <p>Add New Order</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('/doctor') }}" class="nav-link">
                            <i class="fas fa-check-circle nav-icon" style="color: white;"></i>
                            <p>Sent Orders</p>
                        </a>
                    </li>
                @endif

                <!-- LabTechnician Role Menu Items -->
                @if (Auth::user()->role == 'LabTechnician')
                    <li class="nav-item">
                        <a href="{{ URL::to('/home') }}" class="nav-link active">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('/doctor') }}" class="nav-link">
                            <i class="fas fa-user nav-icon" style="color: green;"></i>
                            <p>Doctor's Instruction</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie" style="color: red;"></i>
                            <p>Blood Use <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/blooduse/create') }}" class="nav-link">
                                    <i class="fas fa-plus-circle nav-icon"></i>
                                    <p>Add New Use</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/blooduse/') }}" class="nav-link">
                                    <i class="fas fa-check-circle nav-icon"></i>
                                    <p>Blood Uses</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('/lab_inventory') }}" class="nav-link">
                            <i class="nav-icon fas fa-warehouse" style="color: white;"></i>
                            <p>Blood Inventory</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('/blood_requests/create') }}" class="nav-link">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>Add New Request</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('/blood_requests/') }}" class="nav-link">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>My Requests</p>
                        </a>
                    </li>
                @endif

                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p>Log Out</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

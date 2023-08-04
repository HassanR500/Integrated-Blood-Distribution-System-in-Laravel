<aside class="main-sidebar sidebar-dark-primary elevation-4 " style = "position:fixed">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{('/backend/dist/img/blood1.webp')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-700 text-danger" ><b>Blood DDSS</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" >
       
        @if(Auth::check() && Auth::user()->user_image)
    <img src="{{ asset('storage/' . Auth::user()->user_image) }}" class="img-circle elevation-2" alt="User Image" style="height: 38px;">
@endif 
   
          
        </div>
        <div class="info">
          <a href="#" class="d-block text-info"><b>{{ Auth::user()->name }} </b></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
@if( Auth::user()->role == 'Admin')

<li class="nav-item">
  <a href="{{URL::to('/home')}}" class="nav-link active">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a> 
</li>

<li class="nav-item">
  <a href="" class="nav-link">
    <i class="nav-icon fas fa-chart-pie"></i>
    <p>
      Blood Donations
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{URL::to('/blood_donation/create')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add New Blood Donor</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{URL::to('/blood_donation/')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Available Donations <span class="right badge badge-danger">New</span></p></p>
      </a>
    </li>
  </ul>
</li>


<li class="nav-item">
  <a href="" class="nav-link">
    <i class="nav-icon nav-icon fas fa-calendar-alt"></i>
    <p>
    Blood Requests
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    
    <li class="nav-item">
      <a href="{{URL::to('/blood_requests/create')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add New Request</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{URL::to('/blood_requests/')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Available Blood <span class="right badge badge-danger">New</span></p>
      </a>
    </li>
    
  </ul>
</li>

<li class="nav-item">
  <a href="{{URL::to('/stocks/')}}" class="nav-link">
    <i class="nav-icon fas fa-book"></i>
    <p>
      Stock
      <!-- <span class="right badge badge-danger">New</span> -->
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{URL::to('/admin/create')}}" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p>
      Add User
      <!-- <span class="right badge badge-danger">New</span> -->
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{URL::to('/user_list')}}" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p>
      User List
      <!-- <span class="right badge badge-danger">New</span> -->
    </p>
  </a>
</li>
        
@endif


@if (Auth::user()->role == 'Blood Bank Manager' )

<li class="nav-item">
  <a href="{{URL::to('/home')}}" class="nav-link active">
    <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a> 
</li>

<li class="nav-item">
  <a href="" class="nav-link">
    <i class="nav-icon fas fa-chart-pie"></i>
    <p>
      Blood Donations
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{URL::to('/blood_donation/create')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add New Blood Donor</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{URL::to('/blood_donation/')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Available Donations</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item">
  <a href="{{URL::to('/blood_requests/')}}" class="nav-link">
    <i class="nav-icon nav-icon fas fa-calendar-alt"></i>
      <p>
        Blood Requests
      </p>
    </a>
</li>

<li class="nav-item">
  <a href="{{URL::to('/stocks/')}}" class="nav-link">
    <i class="nav-icon fas fa-book"></i>
    <p>
      Stock
<!-- <span class="right badge badge-danger">New</span> -->
    </p>
  </a>
</li>
     
        
@endif

@if (Auth::user()->role == 'Doctor' )
<li class="nav-item">
  <a href="{{URL::to('/home')}}" class="nav-link active">
    <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
  </a> 
</li>
<li class="nav-item">
  <a href="{{URL::to('/doctor/create')}}" class="nav-link ">
    <i class="nav-icon fas fa-th"></i>
      <p>
        Add New Order
      </p>
  </a> 
</li>
<li class="nav-item">
  <a href="{{URL::to('/doctor')}}" class="nav-link ">
    <i class="far fa-circle nav-icon"></i>
      <p>
        Sent Orders
      </p>
  </a> 
</li>

        
@endif

@if (Auth::user()->role == 'LabTechnician' )
<li class="nav-item">
  <a href="{{URL::to('/home')}}" class="nav-link active">
    <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a> 
</li>
<li class="nav-item">
  <a href="{{URL::to('/doctor')}}" class="nav-link ">
    <i class="far fa-circle nav-icon"></i>
      <p>
        Doctor's Instruction
      </p>
  </a> 
</li>
<li class="nav-item">
  <a href="" class="nav-link">
    <i class="nav-icon fas fa-chart-pie"></i>
    <p>
      Blood Use
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{URL::to('/blooduse/create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Add New Use
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{URL::to('/blooduse/')}}" class="nav-link">
              <i class="fas fa-search fa-fw"></i>
              <p>
                Blood Uses
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
</ul>
</li>

          <li class="nav-item">
            <a href="{{URL::to('/lab_inventory')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Blood Inventory
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="{{URL::to('/blood_requests/create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add New Request</p>
            </a>
          </li>
          <li class="nav-item">
  <a href="{{URL::to('/blood_requests/')}}" class="nav-link">
    <i class="nav-icon nav-icon fas fa-calendar-alt"></i>
      <p>
        My Requests
      </p>
    </a>
</li>
          
        
@endif


<li class="nav-item">
<a class="nav-link" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
<i class="nav-icon  far fa-envelope text-danger"></i> Logout
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
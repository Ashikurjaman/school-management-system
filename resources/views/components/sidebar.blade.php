<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link ">

      <span class="brand-text font-weight-light">School Management </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item">

          @if (Auth::user()->user_type == 1)
          <li class="nav-item">
                <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request:: segment(2)=='dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/list')}}" class="nav-link @if(Request::segment(2)=='list') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/logout')}}" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>Logout</p>
                </a>
              </li>
          @elseif(Auth::user()->user_type == 2)
          <li class="nav-item">
                <a href="{{url('teacher/dashboard')}}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/logout')}}" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>Logout</p>
                </a>
              </li>
              @elseif(Auth::user()->user_type == 3)
              <li class="nav-item">
                <a href="{{url('student/dashboard')}}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/logout')}}" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>Logout</p>
                </a>
              </li>
              @elseif(Auth::user()->user_type == 4)
              <li class="nav-item">
                <a href="{{url('parent/dashboard')}}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/logout')}}" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>Logout</p>
                </a>
              </li>

          @endif

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

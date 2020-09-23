<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.home') }}" class="brand-link">
    <img src="{{asset('public/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">
            Dashboard
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="#" class="d-block"><i class="fas fa-user-lock text-white mr-2 ml-3"></i>{{ auth('admin')->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Hospital
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.hospital') }}" class="nav-link @yield('cpActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Hospital</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('view.hospitals') }}" class="nav-link @yield('viewActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Hospitals</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Pharmacy
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.pharmacy') }}" class="nav-link @yield('cpActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Pharmacy</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('view.pharmacies') }}" class="nav-link @yield('viewActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Pharmacy</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Animal
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.animal') }}" class="nav-link @yield('cpActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Animal</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('view.animals') }}" class="nav-link @yield('viewActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Animal</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Desease
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.diseas') }}" class="nav-link @yield('cpActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Desease</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('view.diseases') }}" class="nav-link @yield('viewActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Desease</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Cure
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.cure') }}" class="nav-link @yield('cpActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Cure</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('view.cures') }}" class="nav-link @yield('viewActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Cure</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview @yield('menuGuide')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Doctor admins
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view.doctoradmin') }}" class="nav-link @yield('addGuide')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>View Requests</p>
                </a>
              </li>
           {{--  <li class="nav-item">
              <a href="{{ route('view.guides') }}" class="nav-link @yield('viewGuide')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>Manage Profiles</p>
              </a>
            </li> --}}
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

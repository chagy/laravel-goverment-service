<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link">
      <img src="{{ asset('asset-admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GovernmentService</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('asset-admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">SETTING</li>
            <li class="nav-item">
                <a href="{!! route('position.list.page') !!}" class="nav-link">
                    <i class="nav-icon fas fa-crown text-warning"></i>
                    <p>
                        ตำแหน่ง
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('department.list.page') !!}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        แผนก
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('province.list.page') !!}" class="nav-link">
                    <i class="nav-icon fas fa-gopuram"></i>
                    <p>
                        จังหวัด
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('district.list.page') !!}" class="nav-link">
                    <i class="nav-icon fas fa-archway"></i>
                    <p>
                        อำเภอ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('sub.district.list.page') !!}" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>
                        ตำบล
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/adminlte/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">d
        <li class="header">OPTIONS</li>
        <!-- Optionally, you can add icons to the links -->
          <li class="{{ Request::is('dashboard')? "active":""}}"><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

          <li class="{{ Request::is('sms')? "active":""}}"><a href="{{ route('sms.index') }}"><i class="fa  fa-phone"></i> <span>Telephone numbers</span></a></li>

          <li class="{{ Request::is('employees')? "active":""}}"><a href="{{ route('employees.index') }}"><i class="fa fa-users"></i> <span>Employees</span></a></li>

        <li class="treeview">
          <a href="#"><i class="fa fa-gears"></i> <span>Actions</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('employees')? "active":""}}"><a href="{{ route('employees.create') }}"><i class="fa fa-users"></i> <span>New Hire Form</span></a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
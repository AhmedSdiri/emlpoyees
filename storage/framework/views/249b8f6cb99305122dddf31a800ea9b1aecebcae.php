  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo e(asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg")); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo e(Auth::user()->name); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/"><i class="fa fa-desktop"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo e(url('employee-management')); ?>"><i class="fa fa-male" aria-hidden="true"></i> <span>Employee Management</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-wrench"></i> <span>System Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('system-management/department')); ?>">Department</a></li>
            <li><a href="<?php echo e(url('system-management/division')); ?>">Division</a></li>
            <li><a href="<?php echo e(url('system-management/country')); ?>">Country</a></li>
            <li><a href="<?php echo e(url('system-management/state')); ?>">State</a></li>
            <li><a href="<?php echo e(url('system-management/city')); ?>">City</a></li>
            <li><a href="<?php echo e(url('system-management/report')); ?>">Report</a></li>
          </ul>
        </li>
        <li><a href="<?php echo e(route('user-management.index')); ?>"><i class="fa fa-user" aria-hidden="true"></i><span>User management</span></a></li>
        <li><a href="<?php echo e(route('client-management.index')); ?>"><i class="fa fa-globe" aria-hidden="true"></i><span>Client Management</span></a></li>
        <li><a href="<?php echo e(route('devis-management.index')); ?>"><i class="fa fa-link"></i><span>Devis Management</span></a></li>
          
        <li class="treeview">
          <a href="#"><i class="fa fa-area-chart" aria-hidden="true"></i> <span>Data Visualisation</span>
               <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span></a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo e(route('chart-management.index')); ?>">Devis Visualisation</a></li>
                  <li><a href="<?php echo e(route('reports-management.index')); ?>">Devis Report</a></li>
            
              </ul>
          </li>
          
        
    
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
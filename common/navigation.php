<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
      <div class="sidebar-brand-icon">
        <i class="fas fa-car"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Rent a Car</div>
    </a>

    <!-- Nav Item  -->
    <?php
    if ($_SESSION['user_type'] == 'Admin') {
      echo '
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customerDetails.php">
        <i class="fas fa-fw fa-list"></i>
        <span>Customer List</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
      <a class="nav-link" href="Excel_Exporter.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Excel Exporter</span></a>
    </li>
    ';
    }
    ?>

    <!-- <hr class="sidebar-divider">
    <li class="nav-item">
      <a class="nav-link" href="Registration.php">
        <i class="fas fa-users"></i>
        <span>Registration</span></a>
    </li> -->
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->